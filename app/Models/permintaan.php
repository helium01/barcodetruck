<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaan extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal', 'kode_unit', 'afdeling', 'km_awal', 'km_akhir', 'selisih', 'rasio'];
}
