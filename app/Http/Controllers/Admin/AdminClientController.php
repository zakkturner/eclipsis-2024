<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Services\NewsletterService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminClientController extends Controller
{

    public function __construct(private NewsletterService $newsletterService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Clients/Index', [
            'clients' => Client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $validatedData = $request->validated();

        Client::create($validatedData);
        $this->newsletterService->subscribe($validatedData['name'], '', $validatedData['email']);
        return Inertia::render('Admin/Clients/Index', [
            'message' => 'New Client Created',
            'data' => $validatedData
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::with('projects')->find($id);

        return Inertia::render('Admin/Clients/Edit', ['client' => $client]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $attrs = $request->validate([
            'company' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'budget' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'owner_birthday' => ['nullable', 'date'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ]);

        $client->update($attrs);

        return redirect(route('admin.clients.index'))->with('success', 'Client updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $client = Client::find($id);
        $client->delete();
        return redirect()->back()->with('success', 'Client deleted successfully.');
    }
}
