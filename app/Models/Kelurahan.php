<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\LokasiWisata;
use App\Models\KecamatanKelurahan;
use App\Models\KelurahanDesa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'kelurahan';
    protected $guarded = ['id'];

    public function kecamatan_kelurahan()
    {
        return $this->hasMany(KecamatanKelurahan::class, 'kelurahan_id', 'id');
    }

    public function kelurahan_desa()
    {
        return $this->hasMany(KelurahanDesa::class, 'kelurahan_id', 'id');
    }

    // public function kecamatan()
    // {
    //     return $this->belongsTo(Kecamatan::class);
    // }

    public function lokasi_wisata()
    {
        return $this->hasMany(LokasiWisata::class, 'kelurahan_id', 'id');
    }
}