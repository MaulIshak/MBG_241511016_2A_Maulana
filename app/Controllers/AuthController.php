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
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UsersModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && (md5($password) == $user['password'])) {
            // Store user data in session
            session()->set('user_id', $user['id']);
            session()->set('name', $user['name']);
            session()->set('role', $user['role']);
            session()->set('isLoggedIn', true);

            return redirect()->to('/')->with('success', 'Login successful');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password');
        }
    }

    public function logout(){
        session()->remove(['isLoggedIn', 'user_id', 'role', 'username']);
        return redirect()->to('/auth/login')->with('success', 'Anda berhasil logout');
    }
}
