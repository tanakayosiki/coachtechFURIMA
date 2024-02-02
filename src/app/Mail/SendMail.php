<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$inviter,$url)
    {
        $this->email=$email;
        $this->inviter=$inviter;
        $this->url=$url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->view('emails.send_invite')->with([
            'inviter'=> $this->inviter,
            'url'=>$this->url]);
                $this->text('emails.send_invite');
    }
}
