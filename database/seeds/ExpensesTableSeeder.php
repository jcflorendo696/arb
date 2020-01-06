<?php

use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'amount'            => '$500.00',
            'item'              => 'Boracay Vacation',
            'category'          => 'Travel',
            'user_id'           => '2',
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s")
        ]);

        DB::table('expenses')->insert([
            'amount'            => '$3500.00',
            'item'              => 'Vikings - eat all you can',
            'category'          => 'Food',
            'user_id'           => '2',
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s")
        ]);

        DB::table('expenses')->insert([
            'amount'            => '$696.00',
            'item'              => 'Pancit Bilao',
            'category'          => 'Food',
            'user_id'           => '3',
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s")
        ]);
    }
}
