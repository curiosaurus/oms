<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQuantityAvailableToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'quantity_available' => [
                'type'       => 'INT',
                'null'       => false,
                'default'    => 0,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', 'quantity_available');
    }
}
