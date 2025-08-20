<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;

    protected $table = 'arsip_surat';

    protected $fillable = [
        'nomor_surat',
        'jenis_surat',
        'subjek',
        'pengirim',
        'penerima',
        'tanggal_surat',
        'deskripsi',
        'file',
    ];
      protected $casts = [
        'tanggal_surat' => 'date',
    ];
}
