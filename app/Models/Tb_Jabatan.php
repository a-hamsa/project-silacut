<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Jabatan extends Model
{
    use HasFactory;
    protected $table = 'tb_jabatan';
    protected $primaryKey = 'Id_Jabatan';
    // protected $fillable = ['Id_Jabatan','Jabatan'];
    protected $guarded = [];

}
