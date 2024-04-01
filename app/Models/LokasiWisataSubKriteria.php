<?php

namespace App\Models;

use App\Models\LokasiWisata;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiWisataSubKriteria extends Model
{
    use HasFactory;

    protected $table = 'lokasi_wisata_sub_kriteria';
    protected $guarded = ['id'];

    public function lokasi_wisata()
    {
        return $this->belongsTo(LokasiWisata::class);
    }
    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}