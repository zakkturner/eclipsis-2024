<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(StoreClientRequest $request)
    {
        $validatedData = $request->validated();

        Client::create($validatedData);
        return Inertia::render('Admin/Clients/Index', [
            'message' => 'New Client Created',
            'data' => $validatedData
        ], 201);
    }


}
