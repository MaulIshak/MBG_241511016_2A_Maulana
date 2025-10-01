<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {
        $data['users'] = $this->userModel->getUser();
        $data['title'] = 'Users';

        return view('admin/users/index', $data); 
    }

    public function create()
    {
        $data['title'] = 'Tambah User';
        return view('admin/users/create' , $data);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'username' => 'required|min_length[5]|is_unique[users.username]',
            'password' => 'required|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        // Simpan data
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role'     => 'user',
        ];

        $this->userModel->insert($data);

        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan');
    }
    
    public function delete($id){
        $this->userModel->delete($id);

        if($this->request->isAJAX()){
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ];
            return $this->response->setJSON($response);
        }

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function edit($id){
        $data['title'] = 'Edit User';
        $data['user'] = $this->userModel->find($id);
        if(!$data['user']){
            return redirect()->to('/users')->with('error', 'User tidak ditemukan');
        }
        return view('admin/users/edit', $data);
    }

    public function detail($id){
        $data['title'] = 'Detail User';
        $data['user'] = $this->userModel->find($id);
        if(!$data['user']){
            return redirect()->to('/users')->with('error', 'User tidak ditemukan');
        }
        return view('admin/users/detail', $data);
    }

    public function update($id){
        $user = $this->userModel->find($id);
        if(!$user){
            return redirect()->to('/users')->with('error', 'User tidak ditemukan');
        }

        $rules = [
            'username' => 'required|min_length[5]|is_unique[users.username,user_id,'.$id.']',
        ];

        // Jika password diisi, tambahkan aturan validasi untuk password
        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[8]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'username' => $this->request->getPost('username'),
        ];

        // Jika password diisi, tambahkan ke data yang akan diupdate
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/users')->with('success', 'User berhasil diperbarui');
    }
}
