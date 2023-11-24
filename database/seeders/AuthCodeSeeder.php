<?php

namespace Database\Seeders;

use App\Models\AuthCode;
use DB;

use Illuminate\Database\Seeder;

class AuthCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('auth_codes')->truncate();
        
        AuthCode::create(['name' => 'ユーザ閲覧', 'auth_code' => 'Read_User']);
        AuthCode::create(['name' => 'ユーザ作成', 'auth_code' => 'Create_User']);
        AuthCode::create(['name' => 'ユーザ更新', 'auth_code' => 'Update_User']);
        AuthCode::create(['name' => 'ユーザ削除', 'auth_code' => 'Delete_User']);
        AuthCode::create(['name' => '端末閲覧', 'auth_code' => 'Read_Device']);
        AuthCode::create(['name' => '端末作成', 'auth_code' => 'Create_Device']);
        AuthCode::create(['name' => '端末更新', 'auth_code' => 'Update_Device']);
        AuthCode::create(['name' => '端末削除', 'auth_code' => 'Delete_Device']);
        AuthCode::create(['name' => 'コメント閲覧', 'auth_code' => 'Read_Comment']);
        AuthCode::create(['name' => 'コメント作成', 'auth_code' => 'Create_Comment']);
        AuthCode::create(['name' => 'コメント更新', 'auth_code' => 'Update_Comment']);
        AuthCode::create(['name' => 'コメント削除', 'auth_code' => 'Delete_Comment']);
        AuthCode::create(['name' => 'お知らせ閲覧', 'auth_code' => 'Read_Notice']);
        AuthCode::create(['name' => 'お知らせ作成', 'auth_code' => 'Create_Notice']);
        AuthCode::create(['name' => 'お知らせ更新', 'auth_code' => 'Update_Notice']);
        AuthCode::create(['name' => 'お知らせ削除', 'auth_code' => 'Delete_Notice']);

    }
}
