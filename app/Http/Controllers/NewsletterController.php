<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class NewsletterController extends Controller
{
    public function __invoke(Request $request)
    {
        dd($request->all());
    }
}
