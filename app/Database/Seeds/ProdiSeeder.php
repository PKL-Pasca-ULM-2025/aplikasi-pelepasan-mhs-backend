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
            "Doktor Administrasi Pendidikan",
            "Doktor Hukum",
            "Doktor Ilmu Kedokteran",
            "Doktor Ilmu Lingkungan",
            "Doktor Ilmu Manajemen",
            "Doktor Ilmu Pertanian",
            "Doktor Kehutanan",
            "Doktor Pendidikan Bahasa Indonesia",
            "Doktor Pendidikan Ilmu Pengetahuan Sosial",
            "Doktor Studi Pembangunan",
            "Doktor Teknik Berkelanjutan",
            "Magister Administrasi Bisnis",
            "Magister Administrasi Pendidikan",
            "Magister Administrasi Publik",
            "Magister Agronomi",
            "Magister Akuntansi",
            "Magister Arsitektur",
            "Magister Biologi",
            "Magister Ekonomi Pembangunan",
            "Magister Ekonomi Pertanian",
            "Magister Fisika",
            "Magister Hukum",
            "Magister Ilmu Komunikasi",
            "Magister Ilmu Pemerintahan",
            "Magister Ilmu Perikanan",
            "Magister Kehutanan",
            "Magister Kenotariatan",
            "Magister Kesehatan Masyarakat",
            "Magister Kimia",
            "Magister Manajemen",
            "Magister Pendidikan Anak Usia Dini",
            "Magister Pendidikan Bahasa dan Sastra Indonesia",
            "Magister Pendidikan Biologi",
            "Magister Pendidikan Ilmu Pengetahuan Alam",
            "Magister Pendidikan IPS",
            "Magister Pendidikan Jasmani",
            "Magister Pengelolaan Sumberdaya Alam & Lingkungan",
            "Magister Studi Pembangunan",
            "Magister Teknik Kimia",
            "Magister Teknik Sipil",
            "Magister Teknologi Pendidikan"
        ];

        foreach ($prodi as $row) {
            $data = [
                'id' => $faker->uuid(),
                'nama_prodi' => $row,
            ];
            $this->db->table('prodi_pilihan')->insert($data);
        }
    }
}
