<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $fillable = [
        'id_user',
        'nisn',
        'tanggal_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'id_spp',
        'jumlah_bayar',
    ];
    public function user()
    {
        return $this->hasMany(Siswa::class, 'id_user', 'id');
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'nisn', 'nisn');
    }
    public function spp()
    {
        return $this->hasMany(Spp::class, 'id_spp', 'id');
    }
}
