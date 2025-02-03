<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = [];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahan::class, 'perusahaan_id', 'id');
    }
}
