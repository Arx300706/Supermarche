<?php

namespace App\Controllers;

use App\Models\CaisseModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new CaisseModel();

        $data['caisses'] = $model->findAll();

        return view('accueil', $data);
    }

    public function caisseSelect()
    {
        $caisseId = $this->request->getPost('caisse_id');

        session()->set('caisse_id', $caisseId);

        return redirect()->to('/achat');
    }
}