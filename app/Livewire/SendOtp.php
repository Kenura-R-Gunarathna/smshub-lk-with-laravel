<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Classes\SMS;

class SendOtp extends Component
{

    #[Rule('required|numeric|min:10')] 
    public $phone;

    #[Rule('required|numeric|digits:6')] 
    public $otp;

    protected $otpGenerated;

    protected $sms;

    public bool $step_1 = true;

    public bool $step_2 = false;

    public bool $success = false;

    public function render()
    {
        return view('livewire.send-otp');
    }

    public function send(){

        $validated = $this->validate(['phone' => 'required|numeric|min:10']);

        try {
                
            $this->sms = new SMS;

            $response = $this->sms->otp()->send($this->phone);

            $this->otpGenerated = $this->sms->getOTP();

            if($response->ok()){

                $this->step_1 = false;

                return $this->step_2 = true;
            }

        } catch (\Throwable $th) {

            return $this->addError('phone', $th->getMessage());
        }
    }

    public function verify(){

        $validated = $this->validate(['otp' => 'required|numeric|digits:6']);

        try {
            
            if($this->otp == $this->otpGenerated){

                $this->step_1 = false;

                $this->step_2 = false;

                return $this->success = true;

            }else{

                $this->addError('otp', 'Invalid OTP number.');
            }

        } catch (\Throwable $th) {

            return $this->addError('phone', $th->getMessage());
        }

    }
}
