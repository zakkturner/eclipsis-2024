<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class PhotoService
{
    /**
     * Create a new class instance.
     */
    public function add(array  $data, int $relatedId, string $photoModel, string $storagePath = 'project_photos',
                        string $foreignKey = 'project_id', UploadedFile $file = null)
    {
        if ($file) {
            $data['img_src'] = $file->store($storagePath, 'public');
        }

        $data[$foreignKey] = $relatedId;

        return $photoModel::create($data);
    }

    public function update(array $data, int $id, string $photoModel,)
    {
        $photoModel::find($id)->update($data);
    }
}
