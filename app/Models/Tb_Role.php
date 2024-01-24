<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Role extends Model
{
    use HasFactory;
    protected $table = 'tb_role';
    public $timestamps = false;
}
