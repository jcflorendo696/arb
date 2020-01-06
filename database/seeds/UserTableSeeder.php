<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super_Admin',
            'role_id'=> '1',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('admin12345'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name' => 'member_1',
            'role_id'=> '2',
            'email' => 'member1@gmail.com',
            'password' => Hash::make('member12345'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name' => 'member_2',
            'role_id'=> '2',
            'email' => 'member2@gmail.com',
            'password' => Hash::make('member12345'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
