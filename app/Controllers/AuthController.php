<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        return redirect()->to('auth/login');
    }
    
    public function login()
    {
        $data['title'] = 'Login Page';
        return view('auth/login', $data);
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Store user data in session
            session()->set('user_id', $user['user_id']);
            session()->set('username', $user['username']);
            session()->set('role', $user['role']);
            session()->set('isLoggedIn', true);

            return redirect()->to('/')->with('success', 'Login successful');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }
    }

    public function logout(){
        session()->remove(['isLoggedIn', 'user_id', 'role', 'username']);
        return redirect()->to('/auth/login')->with('success', 'Anda berhasil logout');
    }
}
