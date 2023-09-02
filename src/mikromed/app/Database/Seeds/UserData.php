<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserData extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'mikroadmin',
            'password' => password_hash('mikropass', PASSWORD_BCRYPT),  //password_hash('mikropass', PASSWORD_BCRYPT),
            'group_id' => 1,
            'level'    => 99
        ];

        $this->db->table('users')->insert($data);
    }
}
