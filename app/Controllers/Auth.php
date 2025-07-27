<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    
    public function login()
    {
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    
    public function attemptLogin()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set([
                'user_id'    => $user['id_user'],
                'username'   => $user['username'],
                'nama_lengkap' => $user['nama_lengkap'],
                'isLoggedIn' => true,
            ]);
            return redirect()->to('/buku')->with('success', 'Selamat datang kembali, ' . $user['nama_lengkap'] . '!');
        }

        return redirect()->back()->withInput()->with('error', 'Username atau Password salah.');
    }

    
    public function logout()
    {
        $this->session->destroy();
        
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
    }
}
