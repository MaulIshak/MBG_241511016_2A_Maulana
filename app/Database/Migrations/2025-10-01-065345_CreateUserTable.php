<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {

            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'unique'     => true,
                    'null'      => false,
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '150',
                    'unique'     => true,
                    'null'      => false,
                ],
                'password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],

                'role' => [
                    'type'       => 'ENUM',
                    'constraint' => ['gudang', 'dapur'],
                    'default'    => 'dapur',
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('users');

    }

    public function down()
    {
        $this->forge->dropTable('users');
        
    }
}
