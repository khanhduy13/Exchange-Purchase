<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

class LayLaiMK extends Mailable
{
    use Queueable, SerializesModels;

    protected $randomString;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($randomString)
    {
        $this->randomString = $randomString;
    }
    public function build()
    {
        return $this->view('emails.forgotpw')
            ->with(['randomString' => $this->randomString])
            ->subject('Cấp lại mật khẩu mới');
    }
}
