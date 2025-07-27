<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'penulis' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'penerbit' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'tahun_terbit' => ['type' => 'INT', 'constraint' => 4, 'null' => true],
            'sinopsis' => ['type' => 'TEXT', 'null' => true],
            'cover_buku' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
        ]);
        $this->forge->addKey('id_buku', true);
        $this->forge->createTable('buku');
    }

    public function down()
    {
        //
    }
}
