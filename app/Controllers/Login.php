<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        echo view('login');
    }
    public function auth()
    {
        $usersModel = new UsersModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $usersModel->where('username', $username)->first();

        if (empty($user)) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/login');
        }
        if ($user['password'] != $password) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/login');
        }
        session()->set('username', $username);
        return redirect()->to('/Pages/data_produk');
    }
    public function logout()
    {
        session()->remove('username');
        return redirect()->to('/');
    }
}
