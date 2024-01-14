<?php

namespace App\Jobs;

use App\Mail\NotifyEmail;
use App\Models\MailList;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // get all emails subscribe
        $subscribes = MailList::all();

        $emails = [];

        foreach ($subscribes as $subscribe) {

            $emails[] = $subscribe->email;
        }

        // send email
        Mail::to($emails)->send(new NotifyEmail($this->data));

        // Mail::send('mail.notify-email', ['data' => $this->data], function ($message) use ($emails) {
        //     $message->to($emails)->subject('Notify Email');
        // });
    }
}
