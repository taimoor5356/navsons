<?php

namespace App\Listeners;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class OrderMailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Recipients who should always be notified when an order is placed,
     * in addition to the customer.
     */
    private const NOTIFICATION_EMAILS = [
        'mtaimoornaveed@gmail.com',
        'taimoornaveed130@gmail.com',
    ];

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if (config('app.mail_username') && config('app.mail_password') && config('app.mail_encryption')) {
            $recipients = array_unique(array_filter([
                $event->email,
                ...self::NOTIFICATION_EMAILS,
            ]));

            Mail::to($recipients)->send(new OrderMail($event->email, $event->order));
        }
    }
}
