<?php

namespace App\Database\Seeds;

use App\Models\DiscountModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class AlumniTerbaikULMSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        $time = Time::now('utc');
        $prodiPilihanModel = new \App\Models\ProdiPilihanModel();
        $prodiPilihanId = $prodiPilihanModel->findColumn('id');

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
                'nama' => $faker->name(),
                'no_tpa_nim' => $faker->numerify('TPA-######'),
                'prodi_pilihan_id' => $faker->randomElement($prodiPilihanId),
                'tahun_lulus' => $faker->year(),
                'prodi_terakhir' => $faker->words(3, true),
                'fakultas_terakhir' => $faker->words(3, true),
                'nim_terakhir' => $faker->numerify('NIM-######'),
                'ipk' => number_format($faker->randomFloat(2, 2.0, 4.0), 2),
                'predikat' => $faker->randomElement(['sangat_memuaskan', 'pujian']),
                'no_hp' => $faker->phoneNumber(),
                'url_berkas' => $faker->url(),
                'sk_dasar' => $faker->sentence(),
                'created_at' => $time,
                'updated_at' => $time,
                'discount_id' => $discount_id
            ];
            $this->db->table('alumni_terbaik_ulm')->insert($data);
        }
    }
}
