<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_User extends Model implements Authenticatable

{
    use HasFactory;
    protected $table = 'tb_user';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public $timestamps = false;

    public function dinas()
    {
        return $this->belongsTo(Tb_Dinas::class, 'Id_Dinas');
    }

    public function role()
    {
        return $this->belongsTo(Tb_Role::class, 'Id_Role');
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Sesuaikan dengan kolom identifikasi di tabel pengguna
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password; // Sesuaikan dengan kolom kata sandi di tabel pengguna
    }

    public function getRememberToken()
    {
        return null; // Kolom remember_token tidak ada dalam tabel Anda
    }

    public function setRememberToken($value)
    {
        // Kolom remember_token tidak ada dalam tabel Anda
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Sesuaikan dengan kolom remember_token di tabel pengguna jika ada
    }
}
