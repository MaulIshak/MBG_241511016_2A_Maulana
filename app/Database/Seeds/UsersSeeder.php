<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Gudang A gudang.a@example.com gudang.a
        // Gudang B gudang.b@example.com gudang.b
        // Dapur A dapur.a@example.com dapur.a
        // Dapur B dapur.b@example.com dapur.b
        // Dapur C dapur.c@example.com dapur.c
        $data = [
            [
                'name'     => 'Gudang A',
                'email'    => 'gudang.a@example.com',
                'password' => password_hash('gudang.a', PASSWORD_BCRYPT),
                'role'     => 'gudang',
            ],
            [
                'name'     => 'Gudang B',
                'email'    => 'gudang.b@example.com',
                'password' => password_hash('gudang.b', PASSWORD_BCRYPT),
                'role'     => 'gudang',
            ],
            [
                'name'     => 'Dapur A',
                'email'    => 'dapur.a@example.com',
                'password' => password_hash('dapur.a', PASSWORD_BCRYPT),
                'role'     => 'dapur',
            ],
            [
                'name'     => 'Dapur B',
                'email'    => 'dapur.b@example.com',
                'password' => password_hash('dapur.b', PASSWORD_BCRYPT),
                'role'     => 'dapur',
            ],
            [
                'name'     => 'Dapur C',
                'email'    => 'dapur.c@example.com',
                'password' => password_hash('dapur.c', PASSWORD_BCRYPT),
                'role'     => 'dapur',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
