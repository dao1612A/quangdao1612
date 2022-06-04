<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailBookSuccess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $doctor;
    protected $transaction;

    public function __construct($doctor, $user, $transaction)
    {
        $this->user   = $user;
        $this->doctor = $doctor;
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            \Mail::to($this->user->email)->send(new \App\Mail\SendEmailBookSuccess($this->doctor, $this->user, $this->transaction));
        } catch (\Exception $exception) {

        }
    }
}
