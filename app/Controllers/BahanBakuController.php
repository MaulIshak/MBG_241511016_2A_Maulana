<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BahanBakuController extends BaseController
{
    public function index()
    {
        //
    }

    public function create()
    {
        $data['title'] = 'Tambah Bahan Baku';
        $data['validation'] = \Config\Services::validation();
        return view('gudang/bahan_baku/create', $data);
    }

    public function store(){
        // Validasi input
        // $rules = [
        //     'nama' => 'required|min_length[3]|is_unique[bahan_baku.nama]',
        // ];

        // if (!$this->validate($rules)) {
        //     return redirect()->back()->withInput()->with('validation', $this->validator);
        // }
        
        // Simpan data
        $data = [
            'nama' => $this->request->getPost('nama'),
            'kategori' => $this->request->getPost('kategori'),
            'satuan' => $this->request->getPost('satuan'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'tanggal_kadaluarsa' => $this->request->getPost('tanggal_kadaluarsa'),
            'status' => 'Tersedia',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $bahanBakuModel = new \App\Models\BahanBakuModel();
        $bahanBakuModel->insert($data);

        return redirect()->to('/bahan-baku')->with('success', 'Bahan Baku berhasil ditambahkan');
    }
}
