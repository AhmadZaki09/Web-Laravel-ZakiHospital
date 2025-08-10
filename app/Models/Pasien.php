<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    // protected $table = 'pasien';

    protected $fillable = [
        'name',
        'gender',
        'penyakit',
        'nomor',
        'dokter_id',
        'alamat',
        'note',
    ];

    function nik() {
        return $this->hasOne(Niks::class);
    }

    function dokter() {
        return $this->belongsTo(Dokter::class);
    }
}
