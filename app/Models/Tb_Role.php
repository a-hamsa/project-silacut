<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Role extends Model
{
    use HasFactory;
    protected $table = 'tb_role';
    protected $primaryKey = 'Id_Role';

    public $timestamps = false;
}
