<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan';
    protected $primaryKey = 'id_penyewaan';
    protected $fillable = ['id_kamar', 'id_user', 'mulai_sewa', 'akhir_sewa', 'jumlah', 'keterangan', 'tanggal_sewa'];
    public $timestamps = false;
}
