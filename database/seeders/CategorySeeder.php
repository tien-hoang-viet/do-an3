<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['name' => 'Nội thất', 'is_parent' => 1,],
            ['name' => 'Giường', 'is_parent' => 1,],
            ['name' => 'Sơn tường', 'is_parent' => 1,]
        ]);
        DB::table('categories')->insert([
            ['name' => 'Bàn', 'is_parent' => 0, 'parent_id' => 1, 'parent_name' => 'Nội thất'],
            ['name' => 'Ghế', 'is_parent' => 0, 'parent_id' => 1, 'parent_name' => 'Nội thất'],
        ]);
    }
}
