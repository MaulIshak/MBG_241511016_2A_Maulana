<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Home';
        
        $data['jumlah_bahan_baku'] = (new \App\Models\BahanBakuModel())->getJumlahBahanBaku();
        $data['jumlah_permintaan'] = (new \App\Models\PermintaanModel())->getJumlahPermintaan();

        // Bahan baku dengan status berbeda
        $data['jumlah_bahan_tersedia'] = (new \App\Models\BahanBakuModel())->getJumlahBahanBakuByStatus('tersedia');
        $data['jumlah_bahan_segera_kadaluarsa'] = (new \App\Models\BahanBakuModel())->getJumlahBahanBakuByStatus('segera_kadaluarsa');
        $data['jumlah_bahan_kadaluarsa'] = (new \App\Models\BahanBakuModel())->getJumlahBahanBakuByStatus('kadaluarsa');

        // Permintaan dengan status berbeda
        $data['jumlah_permintaan_menunggu'] = (new \App\Models\PermintaanModel())->getJumlahPermintaaByStatus('menunggu');
        $data['jumlah_permintaan_ditolak'] = (new \App\Models\PermintaanModel())->getJumlahPermintaaByStatus('ditolak');
        $data['jumlah_permintaan_disetujui'] = (new \App\Models\PermintaanModel())->getJumlahPermintaaByStatus('disetujui');
        return view('index', $data);
    }
}
