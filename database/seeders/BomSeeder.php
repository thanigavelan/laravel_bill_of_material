<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bom;
use App\Models\Product;

class BomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laddu = Product::where('sku', 'PROD_LADDU')->first();
        $gramFlour = Product::where('sku', 'INGR_GRAM_FLOUR')->first();
        $ghee = Product::where('sku', 'INGR_GHEE')->first();
        $sugar = Product::where('sku', 'INGR_SUGAR')->first();
        $cardamom = Product::where('sku', 'INGR_CARDAMOM')->first();
        $nuts = Product::where('sku', 'INGR_NUTS')->first();

        // Laddu is made of these ingredients
        Bom::create(['parent_product_id' => $laddu->id, 'component_product_id' => $gramFlour->id, 'quantity' => 200]); // 200g of Gram Flour
        Bom::create(['parent_product_id' => $laddu->id, 'component_product_id' => $ghee->id, 'quantity' => 100]); // 100g of Ghee
        Bom::create(['parent_product_id' => $laddu->id, 'component_product_id' => $sugar->id, 'quantity' => 150]); // 150g of Sugar
        Bom::create(['parent_product_id' => $laddu->id, 'component_product_id' => $cardamom->id, 'quantity' => 5]);  // 5g of Cardamom
        Bom::create(['parent_product_id' => $laddu->id, 'component_product_id' => $nuts->id, 'quantity' => 50]);   // 50g of Nuts
    }
}


