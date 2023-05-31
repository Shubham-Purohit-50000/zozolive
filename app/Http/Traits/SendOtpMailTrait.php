<?php
namespace App\Http\Traits;
use Mail;

trait SendOtpMailTrait
{
    public static function sendOtpMail($data)
    {
        try {
            $msg = "Your OTP is ".$data['otp']; 
            Mail::raw($msg, function($message) use($data) {
             $message->to($data['to'], 'Zozolive')->subject
                ($data['subject']);
             $message->from('contact@zozolive.com','Zozolive');

             return "Email successfully sent. Check your inbox.";
          });
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}