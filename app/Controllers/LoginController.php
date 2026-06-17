<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function connexion()
    {
        $client = trim((string) $this->request->getPost('client'));

        if (!$client) {
            return redirect()->to('/');
        }

        $clientModel = new ClientModel();
        $clientId = $clientModel->insert([
            'nom' => $client,
            'date' => date('Y-m-d H:i:s'),
        ]);

        session()->set([
            'client_id' => (int) $clientId,
            'client_nom' => $client,
        ]);

        return redirect()->to('/accueil');
    }
}
