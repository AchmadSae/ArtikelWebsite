<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
class Users extends Migration
{
    public function up()
    {


        //create table
        $fields = [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'instagram_name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'isLogged' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
                'null' => true
            ],
            'isAdmin' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at' =>'time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'updated_at' => 'time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);


        $data = array(
            array(
                'username' => 'KaSae',
                'password' => 'saeGuest',
                'instagram_name' => '@ka_sae_',
                'isAdmin' => 0,
            ),
            array(
                'username' => 'NiaSan',
                'password' => 'sanAdmin',
                'instagram_name' => '@ka_nia_',
                'isAdmin' => 1,
            )
        );

        $this->db->table('users')->insertBatch($data);
    }

    public function down()
    {
        //delete table
        $this->forge->dropTable('users', true);
    }
}
