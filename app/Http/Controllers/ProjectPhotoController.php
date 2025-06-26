<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\ProjectPhoto;
use App\Http\Controllers\Controller;
use App\Services\PhotoService;
use Illuminate\Http\Request;

class ProjectPhotoController extends Controller
{

    public function store(PhotoRequest $request, $project_id, PhotoService $photoService)
    {


        $validatedPhoto = $request->validated();
        $photoService->add(
            $validatedPhoto,
            $request->file('img_src'),
            $project_id,
            ProjectPhoto::class
        );

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
