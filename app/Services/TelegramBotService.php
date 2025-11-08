<?php

namespace App\Services;

use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotService
{

    public static function sendInvoice($order_id,$order_datetime,string $name,$email,$total_amount,array $products)
    {
        // sample products
        // $products = [["name" => "IPhone 17 Pro Max","price" => 1500]]

        $string_product = "";
        $counter = 1;
        foreach ($products as $product) {
            $string_product .= $counter.'. '.$product["name"] . " - $". $product["price"] ."\n";
            $counter++;
        }

        Telegram::bot('khmart_bot')->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => '📬 *New Order Received!*
🧾 *Order ID:* #'.$order_id.'
🕒 *Date:* '.$order_datetime.'
👤 *Customer Info:*
Name: '.$name.'
Email: '.$email.'
🛍️ *Items Ordered:*
'.$string_product.'
🚚 *Shipping:* Delivery Fee – 2000៛
💳 *Payment Method:* KHQR (Paid via KHQR)
💰 *Total Amount:* ៛'.$total_amount.' KHR
📌 *Notes from Customer:*

"Please deliver between 2–5 Days."

✅ This order has been paid and is ready for processing.
'
        ]);
    }

}
