<?php

namespace App\Models;


use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Desa;
use App\Models\LokasiWisataSubKriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LokasiWisata extends Model
{
    use HasFactory;

    protected $table = 'lokasi_wisata';
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    // public function tingkat()
    // {
    //     return $this->belongsTo(Tingkat::class);
    // }

    // public function kelas()
    // {
    //     return $this->belongsTo(Kelas::class);
    // }

    public function lokasi_wisata_sub_kriteria()
    {
        return $this->hasMany(LokasiWisataSubKriteria::class, 'lokasi_wisata_id', 'id');
    }
}