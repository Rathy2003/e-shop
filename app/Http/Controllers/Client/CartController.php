<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        return view('client.cart');
    }

    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:product,id',
            'quantity' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $cart = Cart::where('product_id', $request->product_id)->where('user_id', $request->user_id)->first();
        if ($cart) {
            $cart->quantity+= $request->quantity;
            $cart->save();
        }else{
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'quantity' => $request->quantity,
            ]);
        }
        return response()->json(["message" => "Product has been add to cart successfully","id" => $cart->id],201);
    }

    public function getCartList(Request $request)
    {
        $user_id = $request->get('user_id');
        if ($user_id) {
            $cart = Cart::with(["product:id,name,price,image,discount,category_id","product.category:id,name"])->where('user_id', $user_id)->get();
        }
        return response()->json($cart);
    }

    public function getTotalCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user_id = $request->get('user_id');
        $total_cart = Cart::where('user_id', $user_id)->count();

        return response()->json(["total" => $total_cart]);
    }

    public function updateCartQuantity(Request $request)
    {
        $validation = Validator::make($request->all(),[
           'quantity' => 'required',
           'cart_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->messages(), 400);
        }

        $cart_id = $request->get('cart_id');
        $quantity = $request->get('quantity');
        $cartItem = Cart::find($cart_id);
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            return response()->json([
                "message" => "Cart Quantity Updated",
            ],200);
        }
        return response()->json(["message" => "Cart Not Found"], 404);
    }

    public function removeCartItem(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'cart_id' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json($validation->messages(), 400);
        }

        $cart_id = $request->get('cart_id');
        $cartItem = Cart::find($cart_id);
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(["message" => "Cart Item Removed"], 200);
        }
        return response()->json(["message" => "Cart Item Not Found"], 404);
    }
}
