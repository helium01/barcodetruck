<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truk extends Model
{
    use HasFactory;
    protected $fillable = ['id_jenis', 'nama_unit', 'deskripsi'];
}
