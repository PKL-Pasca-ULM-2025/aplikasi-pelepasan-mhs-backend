<?php

namespace App\Database\Seeds;

use App\Models\DiscountModel;
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
            $discount_id = $faker->uuid();

            $discount_data = [
                'id' => $discount_id,
                'discount_sem_1' => $faker->randomNumber(),
                'discount_sem_2' => $faker->randomNumber(),
                'discount_sem_3' => $faker->randomNumber(),
                'discount_sem_4' => $faker->randomNumber(),
                'discount_sem_5' => $faker->randomNumber(),
                'discount_sem_6' => $faker->randomNumber(),
            ];

            $this->db->table('discount')->insert($discount_data);

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
                'sk_dasar' => $faker->sentence(),
                'discount_id' => $discount_id
            ];

            $this->db->table('pegawai_mitra_kerja')->insert($data);
        }
    }
}
