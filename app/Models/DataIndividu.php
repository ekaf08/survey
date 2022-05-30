<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataIndividu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function subpertanyaan()
    {
        return $this->belongsTo(SubPertanyaan::class);
    }
}
