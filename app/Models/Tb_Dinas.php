<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Dinas extends Model
{
    use HasFactory;
    protected $table = 'tb_dinas';
    protected $primaryKey = 'Id_Dinas';
    protected $fillable = ['Dinas'];
}
