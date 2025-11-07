<?php

namespace App\Services;

use KHQR\BakongKHQR;
use KHQR\Helpers\KHQRData;
use KHQR\Models\IndividualInfo;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KHQRService
{
    public function generateQRCode($amount):array
    {
        $data = $this->buildPayload($amount);
        $qr_string = $data["qr"];
        $md5_hash = $data["md5"];
        $image = QrCode::format('png')->errorCorrection("L")->margin(0)->size(300)->generate($qr_string);
        return ["qrcode" => base64_encode($image),"md5" => $md5_hash]; // return base64 qrcode image
    }

    public function check_transaction(string $md5_hash)
    {
        $bakong_token = env("BAKONG_TOKEN");
        $bakong = new BakongKHQR($bakong_token);
        $response = $bakong->checkTransactionByMD5($md5_hash);
        return $response;
    }

    private function buildPayload($amount):array
    {
        $individualInfo = new IndividualInfo(
            bakongAccountID: 'torn_rathy2303@wing',
            merchantName: env("BAKONG_MERCHANT_NAME"),
            merchantCity: env("BAKONG_MERCHANT_CITY"),
            currency: KHQRData::CURRENCY_USD,
            amount: $amount
        );
        $payment_data = BakongKHQR::generateIndividual($individualInfo);
        return ["qr" => $payment_data->data["qr"],"md5" => $payment_data->data["md5"]];
    }
}
