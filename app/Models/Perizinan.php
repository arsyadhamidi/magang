<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'pegawai_id', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahan::class, 'perusahaan_id', 'id');
    }
}
