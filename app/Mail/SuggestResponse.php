<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuggestResponse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($suggest)
    {
        //
        $this->suggest = $suggest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $suggest = $this->suggest;

        return $this->view('emails.suggestResponse',compact('suggest'));

    }
}
