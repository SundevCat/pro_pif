<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailUpdateotom extends Mailable
{
    use Queueable, SerializesModels;

    protected $count_fg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($count_fg)
    {
        $this->count_fg = $count_fg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        dd($this->count_fg);
        dd($this->view('email.update_dow') ->with([
            'count_fg' => $this->count_fg
        ])
    );
        dd("test");
        // return $this->view('email.update_dow')->with(['date_now' => date('d M Y')]);
    }
}
