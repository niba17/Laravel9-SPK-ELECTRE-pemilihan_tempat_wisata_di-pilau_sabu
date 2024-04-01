<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\LokasiWisata;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiWisataKriteria extends Model
{
    use HasFactory;

    protected $table = 'siswa_kriteria';
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    public function lokasi_wisata()
    {
        return $this->belongsTo(LokasiWisata::class);
    }
}