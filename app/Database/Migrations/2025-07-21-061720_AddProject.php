<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProject extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'tanggal_lahir' => [
                'type' => 'DATE'
            ],
            'sks' => [
                'type' => 'INT',
                'constraint' => 255
            ],
            'ipk' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'prodi' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'lama_studi' => [
                'type' => 'INT',
                'constraint' => 255
            ],
            'tanggal_bayar' => [
                'type' => 'DATE',
                'null' => true
            ],
            'biaya' => [
                'type' => 'INT',
                'constraint' => 255
            ],
            'bukti_pembayaran_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'status_validasi' => [
                'type' => 'BOOLEAN',
                'default' => false
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('mahasiswa');
    }
 
    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
