@extends('frontend.layout.app')

@section('title')

Forget Password

@endsection

@section('content')

home

<div class="container mt-4">

    <div class="row">
        @foreach ($product as $item)
            <div class="col-md-4 mb-4">
                <a href="/products/{{ $item->id }}">
                    <div class="card">
                        <img src="{{ $item->GetImagePath() }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <!-- <p class="card-text"><strong>${{ $item->price }}</strong></p> -->
                            <!-- <a href="/cart" class="btn btn-primary">Add to Cart</a> -->
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection