<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [

            // Component

            [
                'name' => 'Gram Flour', 
                'description' => 'Main ingredient for making laddus',
                'sku' => 'INGR_GRAM_FLOUR', 
                'price' => 50.00, 
                'qty' => 100
            ],

            [
                'name' => 'Ghee', 
                'description' => 'Clarified butter for binding and flavor', 
                'sku' => 'INGR_GHEE', 
                'price' => 100.00, 
                'qty' => 50],

            [
                'name' => 'Sugar', 
                'description' => 'Sweetener for laddus', 
                'sku' => 'INGR_SUGAR', 
                'price' => 30.00, 
                'qty' => 200
            ],

            [
                'name' => 'Cardamom', 
                'description' => 'Spice for flavoring', 
                'sku' => 'INGR_CARDAMOM', 
                'price' => 10.00, 
                'qty' => 500
            ],

            [
                'name' => 'Nuts', 
                'description' => 'For garnishing and extra flavor', 
                'sku' => 'INGR_NUTS', 
                'price' => 200.00, 
                'qty' => 300
            ],
            
            // main product

            [
                'name' => 'Laddu', 
                'description' => 'Traditional Indian sweet', 
                'sku' => 'PROD_LADDU', 
                'price' => 20.00, 
                'qty' => 100
            ]


        ];

        foreach($products as $row)
        {
            Product::create($row);
        }

    }
}
