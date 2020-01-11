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
            'name'              => 'Travel',
            'description'       => 'Expenses for being a citizen of the world!',
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s")
        ]);

        DB::table('expenses_categories')->insert([
            'name'            => 'Food',
            'description'       => 'Expenses for being a certified foodie!',
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s")
        ]);
    }
}
