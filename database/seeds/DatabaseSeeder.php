<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
    }
}

class UserstableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Linh Nguyen', 'email' => 'linhnguyen.code@gmail.com', 'password' => '123456', 'phone' => '0969880165', 'address' => 'hanoi', 'level' => '1'],
        ]);
    }
}

