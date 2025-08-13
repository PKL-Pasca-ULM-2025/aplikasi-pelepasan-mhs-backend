<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProdiSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        $prodi = [
            ['nama_prodi' => 'Doktor Administrasi Pendidikan', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Hukum', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Ilmu Kedokteran', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Ilmu Lingkungan', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Ilmu Manajemen', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Ilmu Pertanian', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Kehutanan', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Pendidikan Bahasa Indonesia', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Pendidikan Ilmu Pengetahuan Sosial', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Studi Pembangunan', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Doktor Teknik Berkelanjutan', 'jenjang' => 'doktor'],
            ['nama_prodi' => 'Magister Administrasi Bisnis', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Administrasi Pendidikan', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Administrasi Publik', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Agronomi', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Akuntansi', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Arsitektur', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Biologi', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Ekonomi Pembangunan', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Ekonomi Pertanian', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Fisika', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Hukum', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Ilmu Komunikasi', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Ilmu Pemerintahan', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Ilmu Perikanan', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Kehutanan', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Kenotariatan', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Kesehatan Masyarakat', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Kimia', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Manajemen', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Pendidikan Anak Usia Dini', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Pendidikan Bahasa dan Sastra Indonesia', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Pendidikan Biologi', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Pendidikan Ilmu Pengetahuan Alam', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Pendidikan IPS', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Pendidikan Jasmani', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Pengelolaan Sumberdaya Alam & Lingkungan', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Studi Pembangunan', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Teknik Kimia', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Teknik Sipil', 'jenjang' => 'magister'],
            ['nama_prodi' => 'Magister Teknologi Pendidikan', 'jenjang' => 'magister'],
        ];


        foreach ($prodi as $row) {
            $data = [
                'id' => $faker->uuid(),
                'nama_prodi' => $row['nama_prodi'],
                'jenjang' => $row['jenjang']
            ];
            $this->db->table('prodi_pilihan')->insert($data);
        }
    }
}
