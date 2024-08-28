@extends('frontend.layout.app')

@section('title')
    {{ $product->name }}
@endsection

@section('content')

<style>
    .product-image {
        max-height: 500px;
        object-fit: cover;
    }
    .product-details {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
    }
    .specifications-table, .features-table {
        margin-top: 20px;
    }
</style>

<div class="container my-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <img src="{{ $product->GetImagePath() }}" alt="{{ $product->name }}" class="img-fluid product-image">
        </div>
        
        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <p class="lead">{{ $product->description }}</p>
            <h4 class="text-success mb-3">${{ number_format($product->price, 2) }}</h4>
            <h5>SKU: {{ $product->sku }}</h5>

            <!-- Product Table -->
            <h5 class="mt-4">Product</h5>
            <table class="table table-bordered specifications-table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product->components as $component)
                        <tr>
                            <td>{{ $component->componentProduct->name }}</td>                      
                            <td>{{ $component->qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection