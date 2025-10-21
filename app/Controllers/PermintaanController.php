<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PermintaanController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Permintaan Bahan Baku';
        $data['bahan_baku'] = (new \App\Models\BahanBakuModel())->where('jumlah > 0')->where("status != 'kadaluarsa'")->findAll();
        return view('dapur/permintaan', $data);
    }
    public function store()
    {
        // $rules = [
        //     'tanggal_masak' => 'required|valid_date',
        //     'menu'          => 'required|string|max_length[255]',
        //     'jumlah_porsi'  => 'required|integer|min_length[1]|max_length[4]',
        //     'bahan_baku'    => 'required|string',
        // ];

        // if (!$this->validate($rules)) {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        $permintaanModel = new \App\Models\PermintaanModel();
        $permintaanDetailModel = new \App\Models\PermintaanDetailModel();

        $data = [
            'tgl_masak' => $this->request->getPost('tanggal_masak'),
            'pemohon_id'   => session()->get('user_id'),
            'menu_makan'   => $this->request->getPost('menu'),
            'jumlah_porsi'  => $this->request->getPost('jumlah_porsi'),
            'status' => 'menunggu',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $permintaanModel->insert($data);
        $permintaanId = $permintaanModel->getInsertID();
        $bahanBakuIds = $this->request->getPost('bahan_baku');
        $jumlahDiminta = $this->request->getPost('jumlah_bahan');
        $i = 0;
        foreach ($bahanBakuIds as $bahanBakuId) {
            // dd([
            //     'permintaan_id' => $permintaanId,
            //     'bahan_id' => $bahanBakuId,
            //     'jumlah_diminta' => $jumlahDiminta[$i++],
            // ]);
          $permintaanDetailModel->insert([
                'permintaan_id' => $permintaanId,
                'bahan_id' => $bahanBakuId,
                'jumlah_diminta' => $jumlahDiminta[$i++],
            ]);
        }

        return redirect()->back()->with('success', 'Permintaan bahan baku berhasil dikirim.');
    }

    // Untuk dilihat gudang
    public function showAll()
    {
        $data['title'] = 'Daftar Permintaan Bahan Baku';
        $permintaanModel = new \App\Models\PermintaanModel();
        $data['permintaan'] = $permintaanModel->getPermintaanWithDetails();

        return view('gudang/permintaan', $data);
    }

    public function tolak($id){
        $permintaanModel = new \App\Models\PermintaanModel();

        $data = [
            'status' => 'ditolak'
        ];

        $permintaanModel->update($id, $data);
        return redirect()->back()->with('success', 'Permintaan berhasil ditolak');
    }
    public function terima($id){
        $permintaanModel = new \App\Models\PermintaanModel();
        $permintaanDetailModel = new \App\Models\PermintaanDetailModel();
        $bahanBakuModel = new \App\Models\BahanBakuModel();

        $permintaanDetail = $permintaanDetailModel->where('permintaan_id', $id)->findAll();
        
        foreach ($permintaanDetail as $detail) {
            // Update jumlah bahan baku
            $bahanBaku = $bahanBakuModel->find($detail['bahan_id']);
            if ($bahanBaku) {
                $newJumlah = $bahanBaku['jumlah'] - $detail['jumlah_diminta'];
                if ($newJumlah < 0) {
                    return redirect()->back()->with('error', 'Jumlah bahan baku tidak cukup.');
                }
                $bahanBakuModel->update($detail['bahan_id'], ['jumlah' => $newJumlah]);
            }
        }
        
        $data = [
            'status' => 'disetujui'
        ];
    
        $permintaanModel->update($id, $data);
        
        return redirect()->back()->with('success', 'Permintaan berhasil diterima dan bahan baku diperbarui.');
    }

    public function permintaanSaya()
    {
        $data['title'] = 'Permintaan Saya';
        $permintaanModel = new \App\Models\PermintaanModel();
        $data['permintaan'] = $permintaanModel->getPermintaanByPemohon(session()->get('user_id'));

        return view('dapur/permintaan_saya', $data);
    }
}
