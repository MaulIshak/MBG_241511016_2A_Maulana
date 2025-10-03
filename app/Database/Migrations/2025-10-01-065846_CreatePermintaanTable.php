<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermintaanTable extends Migration
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
            'pemohon_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'tgl_masak' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'menu_makan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'      => false,
            ],
            'jumlah_porsi' => [
                'type'       => 'INT',
                'constraint' => 4,
                'null'      => false,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu', 'disetujui', 'ditolak'],
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pemohon_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('permintaan');

    }

    public function down()
    {
        //
    }
}
