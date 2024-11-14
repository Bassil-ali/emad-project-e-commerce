<?php

namespace App\Jobs;

use App\Mail\NewsletterEmail;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewsletterJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $messageContent;

    /**
     * Create a new job instance.
     *
     * @param string $messageContent
     * @return void
     */
    public function __construct($messageContent)
    {
        $this->messageContent = $messageContent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Fetch all subscribers
        $subscribers = Subscription::all();

        // Send email to each subscriber
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new NewsletterEmail($this->messageContent));
        }
    }
}
