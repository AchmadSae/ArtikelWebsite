<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\MySQLi\Forge;

class Users extends Migration
{
    public function up()
    {


        //create table
        $fields = [
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'isLogged' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
            'isAdmin' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('email', true);
        $this->forge->createTable('users', true);


        $data = array(
            array(
                'email' => 'saeGuest@gmail.com',
                'name' => 'saeGuest',
                'isAdmin' => 0,
            ),
            array(
                'email' => 'saeAdmin@gmail.com',
                'name' => 'saeAdmin',
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
