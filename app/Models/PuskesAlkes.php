<?php

namespace App\Models;

use App\Models\Alkes;
use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PuskesAlkes extends Model
{
    use HasFactory;

    protected $table = 'puskes_alkes';
    protected $guarded = ['id'];

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }

    public function alkes()
    {
        return $this->belongsTo(Alkes::class);
    }
}