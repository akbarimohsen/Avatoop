<?php

namespace App\Channels;

use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Notification;

class SmsChannels{
    public function send($notifiable, Notification $notification)
    {
        // return $notifiable;
          //dd($notifiable, $notification->code);
        
          $receptor = $notifiable->phone_number;
          $type = 1;
          $template = "verification";
          $param1 = $notification->code;
          $api = new \Ghasedak\GhasedakApi('cd29160d5ce70eb8aa9e78612b230667c76f5a65ad8fe09ad0b63b32704888a1');
          //$api = new GhasedakApi(env('GHASEDAK_API_KEY'));
          $api->Verify($receptor, $type, $template, $param1);
    }
}