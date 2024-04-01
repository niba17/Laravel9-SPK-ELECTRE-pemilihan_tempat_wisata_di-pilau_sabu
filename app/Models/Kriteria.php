<?php

namespace App\Models;

use App\Models\LokasiWisataSubKriteria;
use App\Models\KriteriaSubKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $guarded = ['id'];

    public function kriteria_sub_kriteria()
    {
        return $this->hasMany(KriteriaSubKriteria::class, 'kriteria_id', 'id');
    }
    public function lokasi_wisata_sub_kriteria()
    {
        return $this->hasMany(LokasiWisataSubKriteria::class, 'kriteria_id', 'id');
    }
}