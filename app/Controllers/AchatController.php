<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AchatController extends BaseController
{
    public function index()
    {
        $caisseId = session()->get('caisse_id');

        if (!$caisseId) {
            return redirect()->to('/');
        }

        echo "Saisie des achats pour caisse ID : " . $caisseId;
    }
}
