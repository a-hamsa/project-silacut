<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Cuti extends Model
{
    use HasFactory;
    protected $table = 'tb_cuti';
    protected $primaryKey = 'Id_Data_Cuti';

    protected $guarded = [];

    public $timestamps = false;

    public function pegawai()
    {
        return $this->belongsTo(Tb_Pegawai::class, 'NIP');
    }
    public function jeniscuti()
    {
        return $this->belongsTo(Tb_Jenis_Cuti::class, 'Id_Jenis_Cuti');
    }

    protected $casts = [
        'Verifikasi' => 'boolean',
    ];
}
