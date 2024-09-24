<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan_driver extends Migration
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
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_Driver', 'Driver', 'id');
        $this->forge->createTable('Laporan_driver');
    }

    public function down()
    {
        $this->forge->dropTable('Laporan_driver');
    }
}
