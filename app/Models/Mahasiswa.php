<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama', 'nim', 'alamat'];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
