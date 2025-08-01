<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        helper('uuid_helper');
        $time = Time::now('utc');
        $data = [
            [
                'id' => uuid(),
                'username' => 'admin2',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'id' => uuid(),
                'username' => 'user1',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'id' => uuid(),
                'username' => 'admin1',
                'created_at' => $time,
                'updated_at' => $time,
            ],
        ];

        // Using Query Builder
        $db = \Config\Database::connect('auth');
        $db->table('user')->insertBatch($data);

        $userModel = new \App\Models\UserModel();
        $user = $userModel->findAll();
        foreach ($user as $row) {
            $data = [
                'id' => uuid(),
                'user_id' => $row->id,
                'username' => $row->username,
                'password_hash' => password_hash('user123', PASSWORD_DEFAULT),
                'created_at' => $time,
                'updated_at' => $time,
            ];
            $db->table('user_login_info')->insert($data);
        }
    }
}
