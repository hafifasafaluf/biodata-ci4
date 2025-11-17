<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMemberTokenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'member_id'  => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'auth_key'   => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'member', 'id', 'CASCADE', 'NO ACTION');

        $this->forge->createTable('member_token');
    }

    public function down()
    {
        $this->forge->dropTable('member_token');
    }
}
