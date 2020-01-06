<?php

use Illuminate\Database\Seeder;

class ExpensesCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses_categories')->insert([
            'name'            => 'Travel',
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s")
        ]);

        DB::table('expenses_categories')->insert([
            'name'            => 'Food',
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s")
        ]);
    }
}
