<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddClientIdToAchatTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('achat', [
            'client_id' => [
                'type' => 'INTEGER',
                'null' => true,
                'after' => 'caisse_id',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('achat', 'client_id');
    }
}
