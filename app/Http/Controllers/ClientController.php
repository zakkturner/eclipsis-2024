<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Services\NewsletterService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{

    public function __construct(private NewsletterService $newsletterService)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(StoreClientRequest $request)
    {
        $validatedData = $request->validated();

        Client::create($validatedData);
        $this->newsletterService->subscribe($validatedData['name'], '', $validatedData['email']);

        return redirect()->back()->with([
            'message' => 'Thank You! Someone from our team will be in touch with you soon.',
            'data' => $validatedData
        ]);
    }


}
