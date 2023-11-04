<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;

class SMS{

    protected $api_token;

    protected $api_url;

    protected $otp;

    protected $message;

    public function __construct(){

        // Here the default method is POST.

        $this->api_token = config('smshub-lk.api-token');

        $this->api_url = config('smshub-lk.api-url');

        return $this;

    }

    public function otp(int $min = 100000, int $max = 999999){

        $this->otp = mt_rand($min, $max);

        $this->message = 'Your OTP is: '.$this->otp;

        return $this;
    }

    public function sms(string $message){

        $this->message = $message;

        return $this;
    }

    public function send(string $phone){

        $response = Http::withHeaders([
            'Authorization' => $this->api_token,
            'Content-Type' => 'application/json'
        ])->post($this->api_url, [
            'message' => $this->message,
            'phoneNumber' => $phone,
        ]);

        return $response;
    }

    public function getOTP(){
        
        return $this->otp;
    }
}