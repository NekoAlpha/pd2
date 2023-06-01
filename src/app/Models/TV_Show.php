<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TV_Show extends Model
{
    use HasFactory;

    public function director()
    {
        return $this->belongsTo(Director::class);
    }
}
