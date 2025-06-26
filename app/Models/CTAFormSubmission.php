<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTAFormSubmission extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'cta_form_submissions';

    public function cta()
    {
        return $this->belongsTo(Cta::class);
    }
}
