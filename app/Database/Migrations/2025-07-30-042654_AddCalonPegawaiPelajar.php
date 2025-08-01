<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCalonPegawaiPelajar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true
            ],
            'prodi_pilihan_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'no_tpa_nim' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'unit_kerja' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'pekerjaan_di_ulm_saat_ini' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'periode_semester' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'tahun_ajaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'url_berkas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('prodi_pilihan_id', 'prodi_pilihan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('calon_pegawai_pelajar', true);
    }

    public function down()
    {
        $this->forge->dropTable('calon_pegawai_pelajar', true);
    }
}
