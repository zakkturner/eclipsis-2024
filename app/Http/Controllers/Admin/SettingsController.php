<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsController extends Controller
{
    public function __invoke(): \Inertia\Response
    {
        $company_info = CompanyInfo::latest()->first();
        $site_content = SiteContent::latest()->first();
        return Inertia::render("Admin/Settings/Index", [
            "company_info" => $company_info,
            "site_content" => $site_content
        ]);
    }
}
