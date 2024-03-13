<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Jenis_Cuti extends Model
{
    use HasFactory;
    protected $table = 'tb_jenis_cuti';
    protected $primaryKey = 'Id_Jenis_Cuti';
    
    protected $guarded = [];

    public $timestamps = false;
}
