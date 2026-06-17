<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


class TestController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $produits = $db->query("SELECT * FROM produit")->getResult();
        $caisses = $db->query("SELECT * FROM caisse")->getResult();
        $clients = $db->query("SELECT * FROM client")->getResult();
        $achats = $db->query("SELECT * FROM achat")->getResult();

        echo "<pre>";

        echo " PRODUIT\n";
        print_r($produits);

        echo "\n CAISSE\n";
        print_r($caisses);

        echo "\n CLIENT\n";
        print_r($clients);

        echo "\nACHAT\n";
        print_r($achats);

        echo "</pre>";
    }
}
