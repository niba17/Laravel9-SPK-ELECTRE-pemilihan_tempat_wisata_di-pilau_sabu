<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PuskesAlkes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Puskesmas extends Model
{
    use HasFactory;
    protected $table = 'puskesmas';
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->hasOne(Kelurahan::class, 'id', 'kelurahan_id');
    }

    public function alkes()
    {
        return $this->hasMany(PuskesAlkes::class, 'alkes_id', 'id');
    }

    public function puskes_alkes()
    {
        return $this->hasMany(PuskesAlkes::class, 'puskesmas_id', 'id');
    }
}