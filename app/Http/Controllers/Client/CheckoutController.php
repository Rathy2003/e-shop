<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\Invoice;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Services\KHQRService;
use App\Services\TelegramBotService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\KHQR\KHQRController;
use Telegram\Bot\Laravel\Facades\Telegram;

class CheckoutController extends Controller
{
    public function index()
    {

    }

    public function processCheckout(Request $request,KHQRService $khqr)
    {
        $validation = Validator::make($request->all(), [
            "total_price" => "required|numeric",
        ]);

        $user_id = Auth::user()->id;

        if ($validation->fails()) {
            return response()->json($validation->messages(), 400);
        }

        $total_payment = round($request->total_price,2);
        $payment_data = $khqr->generateQRCode($total_payment);
        $qrcode_string = $payment_data['qrcode'];
        $md5_hash = $payment_data['md5'];
        $currency = "KHR";
        $username  = env("BAKONG_MERCHANT_NAME");

        // create payment (save payment data to database)
        $payment = Payment::create([
           'user_id' => $user_id,
           'amount' => $total_payment,
           'status' => "PENDING",
           'md5_hash' => $md5_hash,
        ]);

        $html = view('qrcode',compact("username","qrcode_string","total_payment","currency"))->render();
        return response()->json(["html" => $html,"payment_id" => $payment->id],201);

    }

    // check transaction status (paid or not)
    public function check_transaction(KHQRService $khqr)
    {
        $payment_id = request("payment_id");
        $payment = Payment::find($payment_id);
        if ($payment) {
            $md5_hash = $payment->md5_hash;
            $response = $khqr->check_transaction($md5_hash);
            if($response["data"] != null){
                return response()->json(["message" => "Payment successfull","success" => true],200);
            }

            return response()->json(["message" => "No payment has made.","success" => false],200);
        }
    }

    public function create_order(Request $request)
    {

        $validation = Validator::make($request->all(), [
            "total_price" => "required|numeric",
            "items" => "required|array|min:1",
            "items.*.product_id" => "required|exists:product,id",
            "items.*.quantity" => "required|numeric|min:1",
            "items.*.price" => "required|numeric|min:0",
            "cart_items" => "required|array|min:1",
            "payment_id" => "required|exists:payment,id",
        ]);

        $user_id = Auth::user()->id;

        if ($validation->fails()) {
            return response()->json($validation->messages(), 400);
        }

        $order = Order::create([
           "user_id" => $user_id,
           "total" => $request->total_price,
           "date_time" => date("Y-m-d H:i:s"),
           "paid" => 1
        ]);

        foreach ($request->items as $item) {
            $order->items()->create([
                "product_id" => $item["product_id"],
                "quantity" => $item["quantity"],
                "price" => $item["price"],
            ]);
        }

        // clear cart after success checkout
        foreach ($request->cart_items as $cart_item) {
            $cart = Cart::find($cart_item);
            if ($cart) {
                $cart?->delete();
            }

        }
        $product_order_detail = Order::with(["items:id,order_id,product_id,quantity,price","items.product:id,name"])->find($order->id);
        // change payment status
        $payment = Payment::find($request->payment_id);
        $payment->status = "SUCCESS";

        $order_products = [];
        $total_amount = 0;
        foreach ($product_order_detail->items as $item) {
            $product = ["name" => $item->product->name,"price" => $item->price,"quantity" => $item->quantity];
            $total_amount += $item->quantity * $item->price;
            $order_products[] = $product;
        }

        $formattedOrderDatetime = Carbon::parse($order->date_time)->format('F j, Y – H:i');
        $user_email = Auth::user()->email;
        $user_name = Auth::user()->name;
        $formatted_id = str_pad($order->id, 4, '0', STR_PAD_LEFT);
        TelegramBotService::sendInvoice($formatted_id,$formattedOrderDatetime,$user_name,$user_email,$total_amount,$order_products);
        Mail::to($user_email)->send(new Invoice($product_order_detail));
        return response()->json(["message" => "Your order has been placed.","success" => true],201);
    }
}
