<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class CalonPegawaiPelajarSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        $ProdiPilihanModel = new \App\Models\ProdiPilihanModel();
        $prodiPilihanId = $ProdiPilihanModel->findColumn('id');
        $time = Time::now('utc');

        for ($i = 0; $i < 50; $i++) {
            $data = [
                'id' => $faker->uuid(),
                'prodi_pilihan_id' => $faker->randomElement($prodiPilihanId),
                'nama' => $faker->name(),
                'no_tpa_nim' => $faker->numerify('############'),
                'created_at' => $time,
                'updated_at' => $time,
                'deleted_at' => null,
                'unit_kerja' => $faker->company(),
                'pekerjaan_di_ulm_saat_ini' => $faker->jobTitle(),
                'no_hp' => $faker->phoneNumber(),
                'url_berkas' => $faker->url(),
            ];
            $this->db->table('calon_pegawai_pelajar')->insert($data);
        }
    }
}
