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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ProductOrdersTableSeeder::class);
        // $this->call('UsersTableSeeder');
    }
}

// class UserstableSeeder extends Seeder
// {
//     public function run()
//     {
//         $this->call(CategoryTableSeeder::class);
//     }
// }

