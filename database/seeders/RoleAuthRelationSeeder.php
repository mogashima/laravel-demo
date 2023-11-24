<?php

namespace Database\Seeders;

use DB;
use App\Models\RoleAuthRelation;
use Illuminate\Database\Seeder;

class RoleAuthRelationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('role_auth_relations')->truncate();

        RoleAuthRelation::create(['auth_code' => 'Read_User', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Read_User', 'role_code' => 'user']);
        RoleAuthRelation::create(['auth_code' => 'Create_User', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Update_User', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Update_User', 'role_code' => 'user']);
        RoleAuthRelation::create(['auth_code' => 'Delete_User', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Read_Device', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Read_Device', 'role_code' => 'user']);
        RoleAuthRelation::create(['auth_code' => 'Create_Device', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Update_Device', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Delete_Device', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Read_Comment', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Read_Comment', 'role_code' => 'user']);
        RoleAuthRelation::create(['auth_code' => 'Create_Comment', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Create_Comment', 'role_code' => 'user']);
        RoleAuthRelation::create(['auth_code' => 'Update_Comment', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Delete_Comment', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Read_Notice', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Read_Notice', 'role_code' => 'user']);
        RoleAuthRelation::create(['auth_code' => 'Create_Notice', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Update_Notice', 'role_code' => 'admin']);
        RoleAuthRelation::create(['auth_code' => 'Delete_Notice', 'role_code' => 'admin']);

    }
}
