<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermintaanDetailTable extends Migration
{
    public function up()
    {
        //         Table permintaan_detail {
        //   id int(11) [pk, increment]
        //   permintaan_id int(11) [note: 'Relasi ke tabel permintaan']
        //   bahan_id int(11) [note: 'Relasi ke tabel bahan_baku']
        //   jumlah_diminta int(4) [note: 'Jumlah bahan diminta']
        // }
        // Ref: permintaan_detail.id > permintaan.id
        // Ref: permintaan_detail.bahan_id > bahan_baku.id
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'permintaan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'bahan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'jumlah_diminta' => [
                'type'       => 'INT',
                'constraint' => 4,
                'null'      => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('permintaan_id', 'permintaan', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('bahan_id', 'bahan_baku', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('permintaan_detail');

    }

    public function down()
    {
        $this->forge->dropTable('permintaan_detail');
        
    }
}
