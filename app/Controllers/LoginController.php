<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function connexion()
    {
        $client = $this->request->getPost('client');

        if (!$client) {
            return redirect()->to('/login');
        }

        session()->set('client', $client);

        return redirect()->to('/');
    }
}