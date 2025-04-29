<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ctaFormSubmissions()
    {
        return $this->hasMany(CTAFormSubmission::class);
    }

}
