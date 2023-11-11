<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => '利用者', 'role_code' => 'user']);
        Role::create(['name' => '管理者', 'role_code' => 'admin']);

    }
}
