<?php

namespace App\Controllers;

use App\Models\AchatModel;
use App\Models\CaisseModel;
use App\Models\ProduitModel;

class AchatController extends BaseController
{
    public function index()
    {
        $caisseId = session()->get('caisse_id');

        if (!$caisseId) {
            return redirect()->to('/');
        }

        $caisseModel = new CaisseModel();
        $produitModel = new ProduitModel();
        $achatModel = new AchatModel();

        $caisse = $caisseModel->find($caisseId);

        if (!$caisse) {
            session()->remove('caisse_id');

            return redirect()->to('/');
        }

        $achats = $achatModel->findByCaisse((int) $caisseId);
        $total = 0;

        foreach ($achats as $achat) {
            $total += $achat['quantite'] * $achat['prix_unitaire'];
        }

        return view('achat_form', [
            'caisse' => $caisse,
            'produits' => $produitModel->orderBy('designation', 'ASC')->findAll(),
            'achats' => $achats,
            'total' => $total,
            'errors' => session()->getFlashdata('errors') ?? [],
            'success' => session()->getFlashdata('success'),
        ]);
    }

    public function store()
    {
        $caisseId = session()->get('caisse_id');

        if (!$caisseId) {
            return redirect()->to('/');
        }

        $produitId = (int) $this->request->getPost('produit_id');
        $quantite = (int) $this->request->getPost('quantite');

        $produitModel = new ProduitModel();
        $achatModel = new AchatModel();
        $produit = $produitModel->find($produitId);

        $errors = [];

        if (!$produit) {
            $errors[] = 'Veuillez choisir un produit valide.';
        }

        if ($quantite <= 0) {
            $errors[] = 'La quantite doit etre superieure a 0.';
        }

        if ($produit && $quantite > (int) $produit['stock']) {
            $errors[] = 'La quantite demandee depasse le stock disponible.';
        }

        if ($errors !== []) {
            return redirect()->to('/achat')->with('errors', $errors)->withInput();
        }

        $achatModel->insert([
            'produit_id' => $produitId,
            'caisse_id' => $caisseId,
            'quantite' => $quantite,
            'prix_unitaire' => $produit['prix'],
        ]);

        return redirect()->to('/achat')->with('success', 'Achat ajoute avec succes.');
    }
}
