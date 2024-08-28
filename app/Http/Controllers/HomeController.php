<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        // Fetch all finished products
        $finishedProducts = Product::where('sku', 'like', 'PROD_%')->get();

        $data = [
            'product' => $finishedProducts
        ];

        return view('frontend/home', $data);
    }

    public function show($id)
    {
        try {
            
            // Fetch the product by ID along with its components
            $product = Product::with(['components' => function ($query) {
                $query->with('componentProduct');
            }])->findOrFail($id);

            $data = [
                'product' => $product,
            ];

            // dd($data);

            return view('frontend.show', $data);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the product is not found
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    }
}
