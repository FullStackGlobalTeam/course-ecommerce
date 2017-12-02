<?php

use Illuminate\Database\Seeder;
use App\products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\products::class, 30)->create();
    }
}
