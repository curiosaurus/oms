<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $builder = $this->db->table("users");

        $builder->insert([
            "username"=>"Pratik",
            "email"=>"pdpatil@mitaoe.ac.in",
            "password"=>"123456"
        ]);
    }
}
