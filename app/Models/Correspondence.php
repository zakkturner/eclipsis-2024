<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correspondence extends Model
{
    use HasFactory;

    public $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
