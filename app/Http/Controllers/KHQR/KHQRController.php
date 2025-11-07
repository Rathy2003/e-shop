<?php

namespace App\Http\Controllers\KHQR;

use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use KHQR\BakongKHQR;
use KHQR\Helpers\KHQRData;
use KHQR\Models\IndividualInfo;

class KHQRController extends Controller
{
    public function index()
    {
        dd($this->generateQRCode("test"));
    }

    public static function generatePayment($amount)
    {
        $username = "TAN RATHY";
        $currency = "USD";
        $individualInfo = new IndividualInfo(
            bakongAccountID: 'torn_rathy2303@wing',
            merchantName: 'TORN RATHY',
            merchantCity: 'PHNOM PENH',
            currency: KHQRData::CURRENCY_USD,
            amount: $amount
        );
        $payment_data = BakongKHQR::generateIndividual($individualInfo);
        $qr_string = $payment_data->data["qr"];
        $qrcode_base64 = self::generateQRCode($qr_string);
        return response()->view('qrcode',compact("username","qrcode_base64","amount","currency"))->header('Content-Type', 'text/html');
    }


    public static function generateQRCode(string $text)
    {

        $image = QrCode::format('png')->errorCorrection("L")->margin(0)->size(300)->generate($text);
        $base64 = base64_encode($image);
        return $base64;
    }
}
