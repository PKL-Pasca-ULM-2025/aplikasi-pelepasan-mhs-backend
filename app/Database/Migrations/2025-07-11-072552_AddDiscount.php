<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDiscount extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'=> 'VARCHAR',
                'constraint' => 255,
            ],
            'discount_sem_1' => [
                'type'=> 'VARCHAR',
                'constraint'=> 255,
                'null' => true,
            ],
            'discount_sem_2' => [
                'type'=> 'VARCHAR',
                'constraint'=> 255,
                'null' => true,
            ],
            'discount_sem_3' => [
                'type'=> 'VARCHAR',
                'constraint'=> 255,
                'null' => true,
            ],
            'discount_sem_4' => [
                'type'=> 'VARCHAR',
                'constraint'=> 255,
                'null' => true,
            ],
            'discount_sem_5' => [
                'type'=> 'VARCHAR',
                'constraint'=> 255,
                'null' => true,
            ],
            'discount_sem_6' => [
                'type'=> 'VARCHAR',
                'constraint'=> 255,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('discount');
    }

    public function down()
    {
        //
    }
}
