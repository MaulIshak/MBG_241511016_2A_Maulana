<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class BahanBakuController extends BaseController
{
    public function index()
    {
        $bahanBakuModel = new \App\Models\BahanBakuModel();
        $data['bahan_baku'] = $bahanBakuModel->findAll();
        $data['title'] = 'Bahan Baku';

        // Get current time
        $now = Time::now();

        // Loop through each bahan baku to check status
        foreach ($data['bahan_baku'] as &$bahan) {
            $kadaluarsa = Time::parse($bahan['tanggal_kadaluarsa']);
            $diffDays = $now->difference($kadaluarsa)->getDays();

            if ($bahan['jumlah'] <= 0) {
                $bahan['status'] = 'habis';
            } 
            else if ($now->isAfter($kadaluarsa)) {
                $bahan['status'] = 'kadaluarsa';
            }
            else if ($diffDays <= 3 && $bahan['jumlah'] > 0) {
                $bahan['status'] = 'segera_kadaluarsa';
            }
            else {
                $bahan['status'] = 'tersedia';
            }

        // Update status in database
        $bahanBakuModel->update($bahan['id'], ['status' => $bahan['status']]);
    }
        

        return view('gudang/bahan_baku/index', $data);
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

    public function edit($id)
    {
        $bahanBakuModel = new \App\Models\BahanBakuModel();
        $data['bahan_baku'] = $bahanBakuModel->find($id);
        $data['title'] = 'Edit Bahan Baku';
        $data['validation'] = \Config\Services::validation();

        if (!$data['bahan_baku']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Bahan Baku tidak ditemukan');
        }

        return view('gudang/bahan_baku/edit', $data);
    }

    public function update($id)
    {
        $bahanBakuModel = new \App\Models\BahanBakuModel();
        $bahan_baku = $bahanBakuModel->find($id);

        if (!$bahan_baku) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Bahan Baku tidak ditemukan');
        }

        // Validasi input
        // $rules = [
        //     'nama' => 'required|min_length[3]|is_unique[bahan_baku.nama,id,' . $id . ']',
        // ];

        // if (!$this->validate($rules)) {
        //     return redirect()->back()->withInput()->with('validation', $this->validator);
        // }

        // Update data
        $data = [

            'jumlah' => $this->request->getPost('jumlah'),
        ];

        $bahanBakuModel->update($id, $data);

        return redirect()->to('/bahan-baku')->with('success', 'Bahan Baku berhasil diupdate');
    }
    
    public function delete($id){
        $bahanBakuModel = new \App\Models\BahanBakuModel();
        
        $bahanBakuModel->delete($id);
        if($this->request->isAJAX()){
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ];
            return $this->response->setJSON($response);
        }

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
