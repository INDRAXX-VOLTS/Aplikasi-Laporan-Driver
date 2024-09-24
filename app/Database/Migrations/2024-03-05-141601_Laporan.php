<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan extends Migration
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
            'id_Driver' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'nama_mobil' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'laporandriver' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_Driver', 'Driver', 'id');
        $this->forge->createTable('Laporan');
    }

    public function down()
    {
        $this->forge->dropTable('Laporan');
    }
}
