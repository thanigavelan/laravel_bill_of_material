<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bom;
use PDF;

class InvoiceController extends Controller
{
    public function generateInvoice($productId)
    {
        // Fetch the product by ID
        $product = Product::with(['components' => function ($query) {
            $query->with('componentProduct');
        }])->findOrFail($productId);

        // Calculate the total cost based on BOM components
        $totalCost = 0;
        foreach ($product->components as $component) {
            $totalCost += $component->qty * $component->componentProduct->price;
        }

        // Prepare data for the invoice
        $data = [
            'product' => $product,
            'components' => $product->components,
            'totalCost' => $totalCost,
            'invoiceDate' => now()->format('Y-m-d'),
        ];

        // dd($data);

        // Generate PDF
        $pdf = PDF::loadView('pdf.invoice', $data);

        // Download the PDF
        return $pdf->stream('invoice.pdf');
    }
}
