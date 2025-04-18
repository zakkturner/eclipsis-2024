<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsController extends Controller
{
    public function __invoke(): \Inertia\Response
    {
        $company_info = CompanyInfo::latest()->first();
        return Inertia::render("Admin/Settings/Index", [
            "company_info" => $company_info
        ]);
    }
}
