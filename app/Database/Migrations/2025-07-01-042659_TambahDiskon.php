<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahDiskon extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'nominal' => [
                'type'       => 'DOUBLE',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('TambahDiskon');
    }

    public function down()
    {
        $this->forge->dropTable('diskon');
    }
}
