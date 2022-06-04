<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        DB::table('permissions')->insert(
            [
                ['name' => 'Create Role', 'slug' => 'create-role', 'group' => 1],
                ['name' => 'Create Admin', 'slug' => 'create-admin', 'group' => 3],
                ['name' => 'Create Category', 'slug' => 'create-category', 'group' => 4],
                ['name' => 'Create Product', 'slug' => 'create-product', 'group' => 5],
                ['name' => 'Create Storage', 'slug' => 'create-storage', 'group' => 6],
                ['name' => 'Create Promotion', 'slug' => 'create-promotion', 'group' => 7],
                ['name' => 'Create Customer', 'slug' => 'create-customer', 'group' => 8],
                ['name' => 'Read Role', 'slug' => 'read-role', 'group' => 1],
                ['name' => 'Read Permission', 'slug' => 'read-permission', 'group' => 2],
                ['name' => 'Read Admin', 'slug' => 'read-admin', 'group' => 3],
                ['name' => 'Read Category', 'slug' => 'read-category', 'group' => 4],
                ['name' => 'Read Product', 'slug' => 'read-product', 'group' => 5],
                ['name' => 'Read Storage', 'slug' => 'read-storage', 'group' => 6],
                ['name' => 'Read Promotion', 'slug' => 'read-promotion', 'group' => 7],
                ['name' => 'Read Customer', 'slug' => 'read-customer', 'group' => 8],
                ['name' => 'Update Role', 'slug' => 'update-role', 'group' => 1],
                ['name' => 'Update Admin', 'slug' => 'update-admin', 'group' => 3],
                ['name' => 'Update Category', 'slug' => 'update-category', 'group' => 4],
                ['name' => 'Update Product', 'slug' => 'update-product', 'group' => 5],
                ['name' => 'Update Storage', 'slug' => 'update-storage', 'group' => 6],
                ['name' => 'Update Promotion', 'slug' => 'update-promotion', 'group' => 7],
                ['name' => 'Update Customer', 'slug' => 'update-customer', 'group' => 8],
                ['name' => 'Delete Role', 'slug' => 'delete-role', 'group' => 1],
                ['name' => 'Delete Admin', 'slug' => 'delete-admin', 'group' => 3],
                ['name' => 'Delete Category', 'slug' => 'delete-category', 'group' => 4],
                ['name' => 'Delete Product', 'slug' => 'delete-product', 'group' => 5],
                ['name' => 'Delete Storage', 'slug' => 'delete-storage', 'group' => 6],
                ['name' => 'Delete Promotion', 'slug' => 'delete-promotion', 'group' => 7],
                ['name' => 'Delete Customer', 'slug' => 'delete-customer', 'group' => 8],
            ]
        );
    }
}
