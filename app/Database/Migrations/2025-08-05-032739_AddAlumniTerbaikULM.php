<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAlumniTerbaikULM extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_tpa_nim' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'prodi_pilihan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_lulus' => [
                'type' => 'YEAR',
            ],
            'prodi_terakhir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'fakultas_terakhir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nim_terakhir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ipk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'predikat' => [
                'type' => 'ENUM',
                'constraint' => ['sangat_memuaskan', 'pujian'],
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'url_berkas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'sk_dasar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'periode_semester' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'tahun_ajaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('prodi_pilihan_id', 'prodi_pilihan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('alumni_terbaik_ulm');
    }

    public function down()
    {
        $this->forge->dropTable('alumni_terbaik_ulm', true);
    }
}
