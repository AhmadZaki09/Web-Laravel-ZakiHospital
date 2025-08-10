<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'specialis',
        'gambar',
    ];

    function pasien()
    {
        return $this->hasMany(Pasien::class);
    }

    function komentars()
    {
        return $this->hasMany(komentar::class);
    }

    /**
     * The roles that belong to the Dokter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function days(): BelongsToMany
    {
        return $this->belongsToMany(Day::class, 'dokter_day', 'dokter_id', 'day_id');
    }
}

