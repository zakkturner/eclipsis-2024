<?php

namespace App\Http\Controllers;

use App\Models\ProjectPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectPhotoController extends Controller
{

    public function store(Request $request)
    {
        $validatedPhoto = $request->validate([
            'alt' => 'nullable|min:3|max:255',
            'img_src' => 'nullable|mimes:jpeg,jpg,png,gif',
            'position' => 'nullable|min:3|max:255',
        ]);
        $validatedPhoto['img_src'] = request()->file('img_src')->store('project_photos', 'public');
        $validatedPhoto['project_id'] = 1;
        ProjectPhoto::create($validatedPhoto);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        $validatedPhoto = $request->validate([
            'alt' => 'nullable|min:3|max:255',
            'position' => 'nullable|min:3|max:255',
        ]);
        ProjectPhoto::find($id)->update($validatedPhoto);

        return redirect()->back()->with(['message' => 'Photo Updated Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectPhoto $projectPhoto)
    {
        //
    }
}
