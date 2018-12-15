<?php

namespace App\Http\Controllers\User;

use App\Extensions\SmsRu;
use App\SmsVerification;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{

    public function store($mobileNumber)
    {
        $smsVerifcation = SmsVerification::firstOrNew([
            'mobile_number' => $mobileNumber,
        ]);
        $smsVerifcation->code = rand(100000, 999900);
        $smsVerifcation->save();
        $this->sendSms($smsVerifcation);

    }


    public function sendSms($smsVerifcation)
    {
        $smsru = new SmsRu(config('sms-ru.api'));
        $data = (object) [
            'from' => config('sms-ru.from'),
            'to' => $smsVerifcation->mobile_number,
            'text' => $smsVerifcation->code,
        ];

        try {
            $smsru = $smsru->send_one($data);
            $msg["message"] = $smsru->status;
        }catch (\Exception $exception){
            $msg["message"] = $smsru->status;
        }

        return $msg;
    }
}
