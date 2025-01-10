<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function perizinan()
    {
        return $this->hasMany(Perizinan::class, 'perusahaan_id');
    }
}
