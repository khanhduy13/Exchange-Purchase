<?php

namespace App\Jobs;

use App\Mail\LayLaiMK;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DoiMatKhau implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $randomString;

    /**
     * Create a new job instance.
     *
     * @param string $email
     * @param mixed $randomString
     * @return void
     */
    public function __construct($email, $randomString)
    {
        $this->email = $email;
        $this->randomString = $randomString;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new LayLaiMK($this->randomString));
    }
}
