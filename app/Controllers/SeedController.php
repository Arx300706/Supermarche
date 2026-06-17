<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProduitModel;

class SeedController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // 🛒 5 produits
        $db->query("
            INSERT INTO produit (designation, prix, stock) VALUES
            ('Riz 1kg', 3000, 50),
            ('Sucre', 4500, 30),
            ('Lait 1L', 2500, 20),
            ('Huile 1L', 6000, 15),
            ('Pates', 2000, 40)
        ");

        $db->query("
            INSERT INTO caisse (montant_total, date) VALUES
            (10500, '2026-06-17 10:00:00'),
            (15000, '2026-06-17 12:00:00')
        ");

        echo "Produits insérés";
    }
}
