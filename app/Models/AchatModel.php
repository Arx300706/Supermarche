<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model
{
    protected $table            = 'achat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'produit_id',
        'caisse_id',
        'quantite',
        'prix_unitaire',
    ];

    public function findByCaisse(int $caisseId): array
    {
        return $this->select('achat.*, produit.designation, produit.prix, produit.stock')
            ->join('produit', 'produit.id = achat.produit_id')
            ->where('achat.caisse_id', $caisseId)
            ->orderBy('achat.id', 'DESC')
            ->findAll();
    }
}
