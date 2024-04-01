<?php

namespace App\Models;

use App\Models\Alkes;
use App\Models\Faskes;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PuskesAlkes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaskesAlkes extends Model
{
    use HasFactory;
    protected $table = 'faskes_alkes';
    protected $guarded = ['id'];

    public function faskes()
    {
        return $this->belongsTo(Faskes::class);
    }
    public function alkes()
    {
        return $this->belongsTo(Alkes::class);
    }
}