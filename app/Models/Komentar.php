<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'komentar',
        'dokter_id',
    ];

    function Dokter() {
        return $this->belongsTo(Dokter::class);
    }

    function User() {
        return $this->belongsTo(User::class);
    }
    
}
