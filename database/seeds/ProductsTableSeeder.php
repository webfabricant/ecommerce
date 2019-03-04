<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $p1 = [
        //     'name' => 'Product 1',
        //     'price' => 256,
        //     'image' => '/uploads/products/product.png',
        //     'description' => 'Aliquam non elit lacus. Praesent aliquet, ipsum id scelerisque convallis, mi ligula euismod odio, vel dictum mi risus a mi.'
        // ];
        // $p2 = [
        //     'name' => 'Product 2',
        //     'price' => 300,
        //     'image' => '/uploads/products/product.png',
        //     'description' => 'Aliquam non elit lacus. Praesent aliquet, ipsum id scelerisque convallis, mi ligula euismod odio, vel dictum mi risus a mi.'
        // ];

        // App\Product::create($p1);
        // App\Product::create($p2);

        factory(\App\Product::class, 30)->create();

    }
}
