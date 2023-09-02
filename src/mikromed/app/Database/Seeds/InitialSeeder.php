<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        $this->call('GroupData');
        $this->call('AccessData');
        $this->call('GroupAccessData');
        $this->call('UserData');
    }
}
