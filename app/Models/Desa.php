<?php

namespace App\Models;

use App\Models\Kelurahan;
use App\Models\LokasiWisata;
use App\Models\KelurahanDesa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desa';
    protected $guarded = ['id'];

    public function kelurahan_desa()
    {
        return $this->hasMany(KelurahanDesa::class, 'desa_id', 'id');
    }

    // public function kelurahan()
    // {
    //     return $this->hasMany(Kelurahan::class, 'kecamatan_id', 'id');
    // }

    public function lokasi_wisata()
    {
        return $this->hasMany(LokasiWisata::class, 'desa_id', 'id');
    }
}