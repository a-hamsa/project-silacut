<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Golongan extends Model
{
    use HasFactory;
    protected $table = 'tb_golongan';
    protected $primaryKey = 'Id_Golongan';
    // protected $fillable = ['Id_Golongan','Golongan'];
    protected $guarded = [];

}
