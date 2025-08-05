<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableAddSK extends Migration
{
    public function up()
    {
        $field = [
            'sk_dasar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ];
        $this->forge->addColumn('pegawai_mitra_kerja', $field);
        $this->forge->addColumn('calon_pegawai_pelajar', $field);
        $this->forge->addColumn('on_going_pegawai_pelajar', $field);
    }

    public function down()
    {
        $this->forge->dropColumn('pegawai_mitra_kerja', 'sk_dasar');
        $this->forge->dropColumn('calon_pegawai_pelajar', 'sk_dasar');
        $this->forge->dropColumn('on_going_pegawai_pelajar', 'sk_dasar');
        $this->forge->dropColumn('pegawai_mitra_kerja', 'sk_dasar');
    }
}
