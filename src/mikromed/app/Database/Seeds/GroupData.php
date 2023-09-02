<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupData extends Seeder
{
    public function run()
    {
        $data = [
            'id_group' => 1,
            'name' => 'Super Admin',
            'description' => 'Default group for Super Admin',
        ];

        $this->db->table('user_group')->insert($data);
    }
}
