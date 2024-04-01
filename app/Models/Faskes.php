<?php

namespace App\Models;

use App\Models\Alkes;
use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faskes extends Model
{
    use HasFactory;
    protected $table = 'faskes';
    protected $guarded = ['id'];

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }

    public function alkes()
    {
        return $this->hasMany(Alkes::class, 'faskes_id', 'id');
    }

    public function faskes_alkes()
    {
        return $this->hasMany(FaskesAlkes::class, 'faskes_id', 'id');
    }
}