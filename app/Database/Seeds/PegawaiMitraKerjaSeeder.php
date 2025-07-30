<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\ProdiPilihanModel;

class PegawaiMitraKerjaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        $ProdiPilihanModel = new ProdiPilihanModel();
        $prodiPilihanId = $ProdiPilihanModel->findColumn('id');

        for ($i = 0; $i < 50; $i++) {
            $data = [
                'id' => $faker->uuid(),
                'prodi_pilihan_id' => $faker->randomElement($prodiPilihanId),
                'nama' => $faker->name(),
                'no_tpa_nim' => $faker->numerify('TPA-######'),
                'fakultas_terakhir' => $faker->words(3, true),
                'prodi_terakhir' => $faker->words(3, true),
                'periode_semester' => $faker->randomElement(['Ganjil', 'Genap']),
                'tahun_ajaran' => $faker->year() . '/' . ($faker->year() + 1),
                'no_hp' => $faker->phoneNumber(),
                'url_berkas' => $faker->url(),
            ];

            $this->db->table('pegawai_mitra_kerja')->insert($data);
        }
    }
}
