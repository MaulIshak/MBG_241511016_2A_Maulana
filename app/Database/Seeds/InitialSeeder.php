<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        // ==============================
        // DATA USER
        // ==============================
        $users = [
            [
                'id' => 1,
                'name' => 'Budi Santoso',
                'email' => 'budi.gudang@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24', // md5: pass123
                'role' => 'gudang',
                'created_at' => '2025-09-01 08:00:00',
            ],
            [
                'id' => 2,
                'name' => 'Siti Aminah',
                'email' => 'siti.gudang@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'gudang',
                'created_at' => '2025-09-01 08:05:00',
            ],
            [
                'id' => 3,
                'name' => 'Rahmat Hidayat',
                'email' => 'rahmat.gudang@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'gudang',
                'created_at' => '2025-09-01 08:10:00',
            ],
            [
                'id' => 4,
                'name' => 'Lina Marlina',
                'email' => 'lina.gudang@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'gudang',
                'created_at' => '2025-09-01 08:15:00',
            ],
            [
                'id' => 5,
                'name' => 'Anton Saputra',
                'email' => 'anton.gudang@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'gudang',
                'created_at' => '2025-09-01 08:20:00',
            ],
            [
                'id' => 6,
                'name' => 'Dewi Lestari',
                'email' => 'dewi.dapur@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'dapur',
                'created_at' => '2025-09-01 08:30:00',
            ],
            [
                'id' => 7,
                'name' => 'Andi Pratama',
                'email' => 'andi.dapur@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'dapur',
                'created_at' => '2025-09-01 08:35:00',
            ],
            [
                'id' => 8,
                'name' => 'Maria Ulfa',
                'email' => 'maria.dapur@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'dapur',
                'created_at' => '2025-09-01 08:40:00',
            ],
            [
                'id' => 9,
                'name' => 'Surya Kurnia',
                'email' => 'surya.dapur@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'dapur',
                'created_at' => '2025-09-01 08:45:00',
            ],
            [
                'id' => 10,
                'name' => 'Yanti Fitri',
                'email' => 'yanti.dapur@mbg.id',
                'password' => '32250170a0dca92d53ec9624f336ca24',
                'role' => 'dapur',
                'created_at' => '2025-09-01 08:50:00',
            ],
        ];
        $this->db->table('users')->insertBatch($users);

        // ==============================
        // DATA BAHAN BAKU
        // ==============================
        $bahanBaku = [
            ['id'=>1,'nama'=>'Beras Medium','kategori'=>'Karbohidrat','jumlah'=>500,'satuan'=>'kg','tanggal_masuk'=>'2025-09-01','tanggal_kadaluarsa'=>'2026-03-01','status'=>'tersedia','created_at'=>'2025-09-01 09:00:00'],
            ['id'=>2,'nama'=>'Telur Ayam','kategori'=>'Protein Hewani','jumlah'=>2000,'satuan'=>'butir','tanggal_masuk'=>'2025-09-20','tanggal_kadaluarsa'=>'2025-10-10','status'=>'tersedia','created_at'=>'2025-09-20 09:05:00'],
            ['id'=>3,'nama'=>'Daging Ayam Broiler','kategori'=>'Protein Hewani','jumlah'=>300,'satuan'=>'kg','tanggal_masuk'=>'2025-09-22','tanggal_kadaluarsa'=>'2025-10-02','status'=>'segera_kadaluarsa','created_at'=>'2025-09-22 09:10:00'],
            ['id'=>4,'nama'=>'Tahu Putih','kategori'=>'Protein Nabati','jumlah'=>400,'satuan'=>'potong','tanggal_masuk'=>'2025-09-28','tanggal_kadaluarsa'=>'2025-10-01','status'=>'kadaluarsa','created_at'=>'2025-09-28 09:15:00'],
            ['id'=>5,'nama'=>'Tempe','kategori'=>'Protein Nabati','jumlah'=>350,'satuan'=>'potong','tanggal_masuk'=>'2025-09-27','tanggal_kadaluarsa'=>'2025-10-03','status'=>'segera_kadaluarsa','created_at'=>'2025-09-27 09:20:00'],
            ['id'=>6,'nama'=>'Sayur Bayam','kategori'=>'Sayuran','jumlah'=>150,'satuan'=>'ikat','tanggal_masuk'=>'2025-09-29','tanggal_kadaluarsa'=>'2025-10-01','status'=>'segera_kadaluarsa','created_at'=>'2025-09-29 09:25:00'],
            ['id'=>7,'nama'=>'Wortel','kategori'=>'Sayuran','jumlah'=>100,'satuan'=>'kg','tanggal_masuk'=>'2025-09-21','tanggal_kadaluarsa'=>'2025-10-15','status'=>'tersedia','created_at'=>'2025-09-21 09:30:00'],
            ['id'=>8,'nama'=>'Kentang','kategori'=>'Karbohidrat','jumlah'=>120,'satuan'=>'kg','tanggal_masuk'=>'2025-09-23','tanggal_kadaluarsa'=>'2025-11-20','status'=>'tersedia','created_at'=>'2025-09-23 09:35:00'],
            ['id'=>9,'nama'=>'Minyak Goreng Sawit','kategori'=>'Bahan Masak','jumlah'=>80,'satuan'=>'liter','tanggal_masuk'=>'2025-09-15','tanggal_kadaluarsa'=>'2026-01-01','status'=>'tersedia','created_at'=>'2025-09-15 09:40:00'],
            ['id'=>10,'nama'=>'Susu Bubuk Fortifikasi','kategori'=>'Protein Hewani','jumlah'=>50,'satuan'=>'kg','tanggal_masuk'=>'2025-09-10','tanggal_kadaluarsa'=>'2025-12-10','status'=>'tersedia','created_at'=>'2025-09-10 09:45:00'],
        ];
        $this->db->table('bahan_baku')->insertBatch($bahanBaku);

        // ==============================
        // DATA PERMINTAAN
        // ==============================
        $permintaan = [
            ['id'=>1,'pemohon_id'=>6,'tgl_masak'=>'2025-09-30','menu_makan'=>'Nasi ayam goreng + sayur bayam','jumlah_porsi'=>200,'status'=>'disetujui','created_at'=>'2025-09-28 10:00:00'],
            ['id'=>2,'pemohon_id'=>7,'tgl_masak'=>'2025-09-30','menu_makan'=>'Tempe goreng + sayur wortel','jumlah_porsi'=>150,'status'=>'disetujui','created_at'=>'2025-09-28 10:05:00'],
            ['id'=>3,'pemohon_id'=>8,'tgl_masak'=>'2025-10-01','menu_makan'=>'Nasi + ayam rebus + bayam bening','jumlah_porsi'=>180,'status'=>'menunggu','created_at'=>'2025-09-29 10:10:00'],
            ['id'=>4,'pemohon_id'=>9,'tgl_masak'=>'2025-10-01','menu_makan'=>'Kentang balado + telur rebus','jumlah_porsi'=>120,'status'=>'disetujui','created_at'=>'2025-09-29 10:15:00'],
            ['id'=>5,'pemohon_id'=>10,'tgl_masak'=>'2025-10-02','menu_makan'=>'Nasi tempe orek + sayur sop','jumlah_porsi'=>200,'status'=>'menunggu','created_at'=>'2025-09-29 10:20:00'],
            ['id'=>6,'pemohon_id'=>6,'tgl_masak'=>'2025-10-02','menu_makan'=>'Ayam goreng tepung + wortel kukus','jumlah_porsi'=>220,'status'=>'ditolak','created_at'=>'2025-09-29 10:25:00'],
            ['id'=>7,'pemohon_id'=>7,'tgl_masak'=>'2025-10-03','menu_makan'=>'Nasi telur dadar + bayam bening','jumlah_porsi'=>180,'status'=>'menunggu','created_at'=>'2025-09-30 10:30:00'],
            ['id'=>8,'pemohon_id'=>8,'tgl_masak'=>'2025-10-03','menu_makan'=>'Kentang rebus + ayam suwir','jumlah_porsi'=>160,'status'=>'menunggu','created_at'=>'2025-09-30 10:35:00'],
            ['id'=>9,'pemohon_id'=>9,'tgl_masak'=>'2025-10-04','menu_makan'=>'Nasi + tempe goreng + sayur bening','jumlah_porsi'=>190,'status'=>'menunggu','created_at'=>'2025-09-30 10:40:00'],
            ['id'=>10,'pemohon_id'=>10,'tgl_masak'=>'2025-10-04','menu_makan'=>'Sup ayam + susu fortifikasi','jumlah_porsi'=>210,'status'=>'menunggu','created_at'=>'2025-09-30 10:45:00'],
        ];
        $this->db->table('permintaan')->insertBatch($permintaan);

        // ==============================
        // DATA PERMINTAAN DETAIL
        // ==============================
        $permintaanDetail = [
            ['id'=>1,'permintaan_id'=>1,'bahan_id'=>1,'jumlah_diminta'=>50],
            ['id'=>2,'permintaan_id'=>1,'bahan_id'=>3,'jumlah_diminta'=>40],
            ['id'=>3,'permintaan_id'=>1,'bahan_id'=>6,'jumlah_diminta'=>50],
            ['id'=>4,'permintaan_id'=>2,'bahan_id'=>1,'jumlah_diminta'=>40],
            ['id'=>5,'permintaan_id'=>2,'bahan_id'=>5,'jumlah_diminta'=>30],
            ['id'=>6,'permintaan_id'=>2,'bahan_id'=>7,'jumlah_diminta'=>20],
            ['id'=>7,'permintaan_id'=>3,'bahan_id'=>1,'jumlah_diminta'=>45],
            ['id'=>8,'permintaan_id'=>3,'bahan_id'=>3,'jumlah_diminta'=>30],
            ['id'=>9,'permintaan_id'=>3,'bahan_id'=>6,'jumlah_diminta'=>40],
            ['id'=>10,'permintaan_id'=>4,'bahan_id'=>1,'jumlah_diminta'=>30],
            ['id'=>11,'permintaan_id'=>4,'bahan_id'=>8,'jumlah_diminta'=>20],
            ['id'=>12,'permintaan_id'=>4,'bahan_id'=>2,'jumlah_diminta'=>60],
            ['id'=>13,'permintaan_id'=>5,'bahan_id'=>1,'jumlah_diminta'=>60],
            ['id'=>14,'permintaan_id'=>5,'bahan_id'=>5,'jumlah_diminta'=>30],
            ['id'=>15,'permintaan_id'=>5,'bahan_id'=>7,'jumlah_diminta'=>20],
            ['id'=>16,'permintaan_id'=>6,'bahan_id'=>1,'jumlah_diminta'=>50],
            ['id'=>17,'permintaan_id'=>6,'bahan_id'=>3,'jumlah_diminta'=>50],
            ['id'=>18,'permintaan_id'=>7,'bahan_id'=>1,'jumlah_diminta'=>40],
            ['id'=>19,'permintaan_id'=>7,'bahan_id'=>2,'jumlah_diminta'=>40],
            ['id'=>20,'permintaan_id'=>7,'bahan_id'=>6,'jumlah_diminta'=>30],
            ['id'=>21,'permintaan_id'=>8,'bahan_id'=>1,'jumlah_diminta'=>35],
            ['id'=>22,'permintaan_id'=>8,'bahan_id'=>8,'jumlah_diminta'=>25],
            ['id'=>23,'permintaan_id'=>8,'bahan_id'=>3,'jumlah_diminta'=>20],
            ['id'=>24,'permintaan_id'=>9,'bahan_id'=>1,'jumlah_diminta'=>45],
            ['id'=>25,'permintaan_id'=>9,'bahan_id'=>5,'jumlah_diminta'=>25],
            ['id'=>26,'permintaan_id'=>9,'bahan_id'=>6,'jumlah_diminta'=>30],
            ['id'=>27,'permintaan_id'=>10,'bahan_id'=>1,'jumlah_diminta'=>60],
            ['id'=>28,'permintaan_id'=>10,'bahan_id'=>3,'jumlah_diminta'=>50],
            ['id'=>29,'permintaan_id'=>10,'bahan_id'=>10,'jumlah_diminta'=>10],
        ];
        $this->db->table('permintaan_detail')->insertBatch($permintaanDetail);
    }
}
