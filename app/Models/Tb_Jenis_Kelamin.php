<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Jenis_Kelamin extends Model
{
    use HasFactory;
    protected $table = 'tb_jenis_kelamin';
    protected $primaryKey = 'Id_Jenis_Kelamin';
    protected $fillable = ['Jenis_Kelamin'];
}
