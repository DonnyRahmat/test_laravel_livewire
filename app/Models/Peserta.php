<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'table_peserta';

    protected $fillable = ['nama', 'alamat_email', 'nomor_telp', 'alamat'];
}
