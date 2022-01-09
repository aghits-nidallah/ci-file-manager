<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFilemanagersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'name VARCHAR(255) NOT NULL',
            'path VARCHAR(255) NOT NULL',
            'created_at TIMESTAMP NOT NULL',
            'updated_at TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP()',
        ]);
        $this->forge->createTable('filemanagers');
    }

    public function down()
    {
        $this->forge->dropTable('filemanagers');
    }
}
