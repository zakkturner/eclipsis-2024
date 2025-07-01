<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    public function __invoke(Request $request)
    {
        
        $attr = $request->validate([

            'headline_text' => 'nullable|min:3',
            'headline_title' => 'nullable|min:3',
            'about_text' => 'nullable|min:3',
            'footer_about' => 'nullable|min:3',
        ]);
        try {
            $site_content = SiteContent::updateOrCreate(
                ['id' => 1],
                $attr
            );
            return redirect()->route('admin.settings')->with(["message" => "Site Content Updated Successfully"]);
        } catch (\Exception $exception) {
            return redirect()->route('admin.settings')->with(["message" => "Something went wrong"]);
        }

    }
}
