<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['kode_transaksi', 'id_penyewaan', 'tipe_pembayaran', 'kode_pembayaran', 'jumlah', 'status', 'tanggal_transaksi'];
    public $timestamps = false;
}
