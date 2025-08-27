<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index()
    {

    }

    public function processCheckout(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "user_id" => "required|exists:users,id",
            "total_price" => "required|numeric",
            "items" => "required|array|min:1",
            "items.*.product_id" => "required|exists:product,id",
            "items.*.quantity" => "required|numeric|min:1",
            "items.*.price" => "required|numeric|min:0",
            "cart_items" => "required|array|min:1",
        ]);

        if ($validation->fails()) {
            return response()->json($validation->messages(), 400);
        }

        $order = Order::create([
           "user_id" => $request->user_id,
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

        // Clear Cart
        foreach ($request->cart_items as $cart_item) {
            $cart = Cart::findOrFail($cart_item);
            $cart?->delete();
        }

        return response()->json(["message" => "Order has been saved."], 201);
    }
}
