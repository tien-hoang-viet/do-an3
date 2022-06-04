<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('roles')->delete();
        DB::table('roles')->insert(
            [
                ['id' => 1, 'name' => 'Admin'],
            ]
        );
        DB::table('admins')->insert(
            [
                ['full_name' => 'Tien Hoang', 'email' => 'tien123@gmail.com', 'address' => '123 Main Street', 'identity_number' => '123123123', 'phone_number' => '123123123', 'password' => bcrypt(123), 'is_master' => true, 'role_id' => '1'],
                ['full_name' => 'Minh Tien', 'email' => 'minhtien123@gmail.com', 'address' => '123 Main Street', 'identity_number' => '123112323123', 'phone_number' => '123123123123', 'password' => bcrypt(123), 'is_master' => true, 'role_id' => '1'],
                ['full_name' => 'Minh Thanh', 'email' => 'thanh123@gmail.com', 'address' => '123 Main Street', 'identity_number' => '123123123', 'phone_number' => '123123123', 'password' => bcrypt(123), 'is_master' => true, 'role_id' => '1'],
                ['full_name' => 'Xuan Chau', 'email' => 'xuanchau@gmail.com', 'address' => '123 Main Street', 'identity_number' => '123123123', 'phone_number' => '123123123', 'password' => bcrypt(123), 'is_master' => true, 'role_id' => '1'],
            ]
        );
    }
}
