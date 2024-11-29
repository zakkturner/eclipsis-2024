<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {

        $announcement = Announcement::where('is_visible', 1)->first();
        $services = Service::where('is_visible', 1)->get();
        $posts = Post::all();
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'announcement' => $announcement,
            'services' => $services,
            'posts' => $posts,
        ]);
    }
}
