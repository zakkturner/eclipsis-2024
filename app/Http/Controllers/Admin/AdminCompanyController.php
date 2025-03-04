<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    public function __invoke(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'instagram_url' => 'nullable',
            'youtube_url' => 'nullable',
        ]);
        $company = CompanyInfo::updateOrCreate(
            ['id' => 1],
            $attr
        );
        return redirect()->route('admin.settings')->with(["message" => "Company Info Updated Successfully"]);
    }
}
