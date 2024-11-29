<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function case_studies()
    {
        return $this->hasMany(CaseStudy::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project_photos()
    {
        return $this->hasMany(ProjectPhoto::class);
    }
}
