<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        $data['username']  = session()->get('username');
        echo view('index', $data);
    }
}
