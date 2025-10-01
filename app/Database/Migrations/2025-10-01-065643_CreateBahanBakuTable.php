<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBahanBakuTable extends Migration
{
    public function up()
    {
        //       Table bahan_baku {
        //   id int(11) [pk, increment]
        //   nama varchar(120) [note: 'Nama Bahan']
        //   kategori varchar(60) [note: 'Kategori Bahan']
        //   jumlah int(4) [note: 'Stok Tersedia']
        //   satuan varchar(20) [note: 'Satuan Bahan']
        //   tanggal_masuk date
        //   tanggal_kadaluarsa date
        //   status status_bahan_baku
        //   created_at datetime [note: 'Waktu Dibuat']
        // }

        // Enum status_bahan_baku {
        //   "tersedia"
        //   "segera_kadaluarsa"
        //   "kadaluarsa"
        //   "habis"
        // }

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '120',
                'null'      => false,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'null'      => false,
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 4,
                'null'      => false,
            ],
            'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'      => false,
            ],
            'tanggal_masuk' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_kadaluarsa' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['tersedia', 'segera_kadaluarsa', 'kadaluarsa', 'habis'],
                'default'    => 'tersedia',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bahan_baku');
    }

    public function down()
    {
        //
    }
}
