<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;


class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            $time = Time::now('utc');
            $data = [
                'id' => $faker->uuid(),
                'nama' => $faker->name(),
                'nim' => $faker->numerify('#############'),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date(),
                'sks' => $faker->numberBetween(38,58),
                'ipk' => $faker->randomFloat(2,3,4),
                'prodi' => $faker->randomElement(['Ilmu Lingkungan Program Doktor', 'Pendidikan Jasmani Program Magister', 'Pengelolaan Sumberdaya Alam dan Lingkungan Program Magister', 'Administrasi Pendidikan Program Magister', 'Pendidikan Biologi Program Magister']),
                'lama_studi' => $faker->numberBetween(2,4),
                'tanggal_bayar' => $faker->date(),
                'biaya' => 500000,
                'created_at' => $time,
                'updated_at' => $time

            ];
            $this->db->table('mahasiswa')->insert($data);
        }

    }
}
