<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['nama_user', 'alamat', 'no_telepon', 'email', 'username', 'password', 'status', 'jenis_user'];
    public $timestamps = false;
}
