<?php

namespace App\Services;

use Resend;

class NewsletterService
{
    public static function subscribe($first_name, $last_name, $email)
    {
        $resend = Resend::client(env("RESEND_API_KEY"));

        $resend->contacts->create(
            'd2de2a17-3a58-4fdc-b161-f82e005758b8',
            [
                'email' => $email,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'unsubscribed' => false
            ]
        );
    }
}
