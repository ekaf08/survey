<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DataWarga extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // public $timestamps = false;

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    // }
}
