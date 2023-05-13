<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class PostCardSendingService
{

    private mixed $coutry;
    private mixed $widht;
    private mixed $height;

    public function __construct($country, $widht, $height)
    {
        $this->coutry = $country;
        $this->widht = $widht;
        $this->height = $height;
    }

    public function hello($message, $email)
    {
        Mail::raw($message, function ($message) use ($email) {
            $message->to($email);
        });


        dump('postcard was send with the message : '. $message);
    }
}
