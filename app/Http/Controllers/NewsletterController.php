<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Providers\NewsletterServiceProvider;
use App\Services\NewsletterService;
use Illuminate\Http\Request;


class NewsletterController extends Controller
{

    public function __construct(private NewsletterService $newsletterService)
    {

    }

    public function __invoke(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);


        $this->newsletterService->subscribe($attr['first_name'], $attr['last_name'], $attr['email']);

        Client::create([
            'email' => $attr['email'],
            'name' => $attr['first_name'] . '  ' . $attr['last_name'],
            'lead_source' => "Newsletter Subscriber",
        ]);
        return redirect()->back()->with("message", "You have successfully subscribed to our newsletter");
    }
}
