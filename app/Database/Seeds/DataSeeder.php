<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->call('ProdiSeeder');
        $this->call('CalonPegawaiPelajarSeeder');
        $this->call('OnGoingPegawaiPelajarSeeder');
        $this->call('PegawaiMitraKerjaSeeder');
        $this->call('AlumniPredikatPujianULMSeeder');
        $this->call('AlumniTerbaikULMSeeder');
    }
}
