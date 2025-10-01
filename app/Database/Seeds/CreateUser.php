<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CreateUser extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
            'role'     => 'admin',
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);

        $data = [
            'username' => 'user',
            'password' => password_hash('user123', PASSWORD_BCRYPT),
            'role'     => 'user',
        ];
        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
