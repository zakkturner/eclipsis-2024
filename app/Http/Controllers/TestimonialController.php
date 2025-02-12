<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPUnit\Util\Test;

class TestimonialController extends Controller
{
    /**
     * Displays all testimonials for the frontend
     */
    public function __invoke(): void
    {
        Testimonial::with("client")->take(3)->get();

    }

}
