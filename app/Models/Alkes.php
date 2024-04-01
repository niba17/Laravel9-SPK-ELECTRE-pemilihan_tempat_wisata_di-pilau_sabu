<?php

namespace App\Models;

use App\Models\Faskes;
use App\Models\Puskesmas;
use App\Models\FaskesAlkes;
use App\Models\PuskesAlkes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alkes extends Model
{
    use HasFactory;

    protected $table = 'alkes';
    protected $guarded = ['id'];

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }

    public function faskes()
    {
        return $this->belongsTo(Faskes::class);
    }

    public function puskes_alkes()
    {
        return $this->hasMany(PuskesAlkes::class, 'alkes_id', 'id');
    }

    public function faskes_alkes()
    {
        return $this->hasMany(FaskesAlkes::class, 'alkes_id', 'id');
    }
}