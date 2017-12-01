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
        $p1 = [
            'name' => 'Learn to build  website in HTML5',
            'image' => 'products/img_ml_1.jpg',
            'price' => 5000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ];

        $p2 = [
            'name' => 'PHP development in depth',
            'image' => 'products/img_ml_2.jpg',
            'price' => 2400,
            'description' => 'Sed lacinia lorem mauris, eu hendrerit risus elementum in.'
        ];

        $p3 = [
            'name' => 'Other PHP development in depth',
            'image' => 'products/img_ml_3.jpg',
            'price' => 2800,
            'description' => 'Nunc in mauris luctus, rutrum augue rhoncus, molestie mauris.'
        ];


        products::create($p1);
        products::create($p2);
        products::create($p3);

    }
}
