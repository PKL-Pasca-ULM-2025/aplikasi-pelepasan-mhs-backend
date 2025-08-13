<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProdiPilihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true
            ],
            'nama_prodi' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'jenjang' => [
                'type' => 'ENUM',
                'constraint' => ['magister', 'doktor']
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('prodi_pilihan', true);
    }

    public function down()
    {
        $this->forge->dropTable('prodi_pilihan', true);
    }
}
