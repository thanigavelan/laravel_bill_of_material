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
        $data = [
            'product' => Product::all()
        ];

        return view('frontend/home', $data);
    }

    public function show($id)
    {
        try {
            
            $data = [
                'product' => Product::findOrFail($id),
            ];

            // dd($data);

            return view('frontend.show', $data);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the product is not found
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    }
}
