<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $fillable = [
        'tahun',
        'nominal',
    ];
    protected $table = "spp";
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_spp', 'id');
    }
}
