<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class InitialLoginTable extends Migration
{
    public function up()
    {
        
        //Create Table access_list
        $this->forge->addField([
            'id_access' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => TRUE,
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default' => null
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default' => null
            ],
            'parent_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'default'    => 0,
            ],
            'description' => [
                'type'       => 'TEXT',
                'default' => null
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type'    => 'TIMESTAMP',
                'default' => null
            ],
        ]);

        $this->forge->addKey('id_access', true);
        $this->forge->createTable('access_list');
        //End Create Table access_list

        //Create Table user_group
        $this->forge->addField([
            'id_group' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => TRUE,
            ],
            'description' => [
                'type'       => 'TEXT',
                'default' => null
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type'    => 'TIMESTAMP',
                'default' => null
            ],
        ]);

        $this->forge->addKey('id_group', true);
        $this->forge->createTable('user_group');
        //End Create Table user_group

        //Create Table user
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => TRUE,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'level' => [
                'type'       => 'INT',
                'constraint' => '2',
                'default'    => 1
            ],
            'group_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'default' => null
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type'    => 'TIMESTAMP',
                'default' => null
            ],
        ]);

        $this->forge->addKey('id_user', true);
        //references group_id to id_group on user_group table
        $this->forge->addForeignKey('group_id', 'user_group', 'id_group');
        $this->forge->createTable('users');
        //End of Create Table user

        //Create Table group_access
        $this->forge->addField([
            'id_group_access' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'group_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'access_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type'    => 'TIMESTAMP',
                'default' => null
            ],
        ]);

        $this->forge->addKey('id_group_access', true);
        //references group_id to id_group on user_group table
        $this->forge->addForeignKey('group_id', 'user_group', 'id_group');
        $this->forge->addForeignKey('access_id', 'access_list', 'id_access');
        $this->forge->createTable('group_access');
        //End of Create Table group_access

        //Create Table user_access
        $this->forge->addField([
            'id_user_access' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'access_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type'    => 'TIMESTAMP',
                'default' => null
            ],
        ]);

        $this->forge->addKey('id_user_access', true);
        //references user_id to id_user on user_access table
        $this->forge->addForeignKey('user_id', 'users', 'id_user');
        $this->forge->addForeignKey('access_id', 'access_list', 'id_access');
        $this->forge->createTable('user_access');
        //End of Create Table user_access
    }

    public function down()
    {
        $this->forge->dropTable('user_access', true);
        $this->forge->dropTable('group_access', true);
        $this->forge->dropTable('users', true);
        $this->forge->dropTable('user_group', true);
        $this->forge->dropTable('access_list', true);
    }
}
