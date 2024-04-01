<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelurahanDesa extends Model
{
    use HasFactory;

    protected $table = 'kelurahan_desa';
    protected $guarded = ['id'];


    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}