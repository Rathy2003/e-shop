<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function getAllOrders(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "user_id" => "required|exists:users,id",
        ]);
        if ($validation->fails()) {
            return response()->json($validation->messages(), 400);
        }

        $orders = Order::with(["items:id,order_id,product_id,quantity,price","items.product:id,name,price,discount,image"])->where('user_id', $request->user_id)->get();
        return response()->json($orders);
    }
}
