<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_dinas', function (Blueprint $table) {
            $table->id('Id_Dinas');
            $table->string('Dinas', 255);
        });

        DB::table('tb_dinas')->insert([
            ['Id_Dinas' => 1, 'Dinas' => 'BKD'],
            ['Id_Dinas' => 2, 'Dinas' => '-'],
            ['Id_Dinas' => 3, 'Dinas' => 'DINAS PENDIDIKAN DAN KEBUDAYAAN DAERAH'],
            ['Id_Dinas' => 4, 'Dinas' => 'DINAS PEMUDA OLAHRAGA DAN PARIWISATA DAERAH'],
            ['Id_Dinas' => 5, 'Dinas' => 'DINAS KESEHATAN PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA'],
            ['Id_Dinas' => 6, 'Dinas' => 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL'],
            ['Id_Dinas' => 7, 'Dinas' => 'DINAS PEMBERDAYAAN MASYARAKAT DESA PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'],
            ['Id_Dinas' => 8, 'Dinas' => 'DINAS SOSIAL DAERAH'],
            ['Id_Dinas' => 9, 'Dinas' => 'DINAS SATUAN POLISI PAMONG PRAJA DAERAH'],
            ['Id_Dinas' => 10, 'Dinas' => 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU DAERAH'],
            ['Id_Dinas' => 11, 'Dinas' => 'DINAS KOPERASI, USAHA KECIL DAN MENENGAH DAERAH'],
            ['Id_Dinas' => 12, 'Dinas' => 'DINAS PERDAGANGAN KABUPATEN DAN PERINDUSTRIAN DAERAH'],
            ['Id_Dinas' => 13, 'Dinas' => 'DINAS TRANSMIGRASI DAN TENAGA KERJA DAERAH'],
            ['Id_Dinas' => 14, 'Dinas' => 'DINAS KOMUNIKASI DAN INFORMASI DAERAH'],
            ['Id_Dinas' => 15, 'Dinas' => 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG DAERAH'],
            ['Id_Dinas' => 16, 'Dinas' => 'DINAS PERUMAHAN, KAWASAN PERMUKIMAN DAN PERTANAHAN DAERAH'],
            ['Id_Dinas' => 17, 'Dinas' => 'DINAS PERHUBUNGAN DAERAH'],
            ['Id_Dinas' => 18, 'Dinas' => 'DINAS LINGKUNGAN HIDUP DAERAH'],
            ['Id_Dinas' => 19, 'Dinas' => 'DINAS PERTANIAN DAN KETAHANAN PANGAN DAERAH'],
            ['Id_Dinas' => 20, 'Dinas' => 'DINAS PERIKANAN DAERAH'],
            ['Id_Dinas' => 21, 'Dinas' => 'DINAS PERPUSTAKAAN DAERAH'],
            ['Id_Dinas' => 22, 'Dinas' => 'BADAN PERENCANAAN PEMBANGUNAN, PENELITIAN DAN PENGEMBANGAN DAERAH'],
            ['Id_Dinas' => 23, 'Dinas' => 'BADAN PENGELOLA KEUANGAN DAN ASET DAERAH'],
            ['Id_Dinas' => 24, 'Dinas' => 'BADAN PENDAPATAN DAERAH'],
            ['Id_Dinas' => 25, 'Dinas' => 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SDM DAERAH'],
            ['Id_Dinas' => 26, 'Dinas' => 'BADAN PENANGGULANGAN BENCANA DAERAH'],
            ['Id_Dinas' => 27, 'Dinas' => 'BADAN KESATUAN BANGSA DAN POLITIK DAERAH'],
            ['Id_Dinas' => 28, 'Dinas' => 'INSPEKTORAT DAERAH'],
            ['Id_Dinas' => 29, 'Dinas' => 'SEKRETARIAT DPRD'],
            ['Id_Dinas' => 30, 'Dinas' => 'SEKRETARIAT DAERAH KAB. MOROWALI'],
            ['Id_Dinas' => 31, 'Dinas' => 'BAGIAN TATA PEMERINTAHAN DAN OTONOMI DAERAH'],
            ['Id_Dinas' => 32, 'Dinas' => 'BAGIAN ADMINISTRASI KESEJAHTERAAN MASYARAKAT DAN KEMASYARAKATAN'],
            ['Id_Dinas' => 33, 'Dinas' => 'BAGIAN ADMINISTRASI SUMBER DAYA ALAM'],
            ['Id_Dinas' => 34, 'Dinas' => 'BAGIAN ADM. PEREKONOMIAN'],
            ['Id_Dinas' => 35, 'Dinas' => 'BAGIAN ADMINISTRASI PEMBANGUNAN'],
            ['Id_Dinas' => 36, 'Dinas' => 'BAGIAN LAYANAN PENGADAAN'],
            ['Id_Dinas' => 37, 'Dinas' => 'BAGIAN UMUM DAN PROTOKOLER'],
            ['Id_Dinas' => 38, 'Dinas' => 'BAGIAN ORGANISASI DAN TATALAKSANA'],
            ['Id_Dinas' => 39, 'Dinas' => 'BAGIAN HUKUM'],
            ['Id_Dinas' => 40, 'Dinas' => 'KECAMATAN MENUI KEPULAUAN'],
            ['Id_Dinas' => 41, 'Dinas' => 'KECAMATAN BUNGKU SELATAN'],
            ['Id_Dinas' => 42, 'Dinas' => 'KECAMATAN BUNGKU PESISIR'],
            ['Id_Dinas' => 43, 'Dinas' => 'KECAMATAN BAHODOPI'],
            ['Id_Dinas' => 44, 'Dinas' => 'KECAMATAN BUNGKU TIMUR'],
            ['Id_Dinas' => 45, 'Dinas' => 'KECAMATAN BUNGKU TENGAH'],
            ['Id_Dinas' => 46, 'Dinas' => 'KECAMATAN BUNGKU BARAT'],
            ['Id_Dinas' => 47, 'Dinas' => 'KECAMATAN BUMI RAYA'],
            ['Id_Dinas' => 48, 'Dinas' => 'KECAMATAN WITAPONDA'],
            ['Id_Dinas' => 49, 'Dinas' => 'KECAMATAN SOMBORI'],
            ['Id_Dinas' => 50, 'Dinas' => 'PUSKESMAS ULUNAMBO KEC. MENUI KEPULAUAN'],
            ['Id_Dinas' => 51, 'Dinas' => 'PUSKESMAS KALEROANG KEC. BUNGKU SELATAN'],
            ['Id_Dinas' => 52, 'Dinas' => 'PUSKESMAS LAFEU KEC. BUNGKU PESISIR'],
            ['Id_Dinas' => 53, 'Dinas' => 'PUSKESMAS BAHODOPI KEC. BAHODOPI'],
            ['Id_Dinas' => 54, 'Dinas' => 'PUSKESMAS BAHOMOTEFE KEC. BUNGKU TIMUR'],
            ['Id_Dinas' => 55, 'Dinas' => 'PUSKESMAS BUNGKU KEC. BUNGKU TENGAH'],
            ['Id_Dinas' => 56, 'Dinas' => 'PUSKESMAS WOSU KEC. BUNGKU BARAT'],
            ['Id_Dinas' => 57, 'Dinas' => 'PUSKESMAS KEC. BUMI RAYA'],
            ['Id_Dinas' => 58, 'Dinas' => 'PUSKESMAS KEC. WITAPONDA'],
            ['Id_Dinas' => 59, 'Dinas' => 'PUSKESMAS TANJUNG HARAPAN'],
            ['Id_Dinas' => 60, 'Dinas' => 'PUSKESMAS FONUASINGKO'],            
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dinas');
    }
};
