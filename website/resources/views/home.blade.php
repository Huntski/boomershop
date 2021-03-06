@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="css/taurese.css">
@endsection

@section('content')
<div class="home">
    <span style="display:block; height: 25px;"></span>
    <div class="aanbieding">
        <div class="aanbieding__content">
            <p class="title" style="text-transform: uppercase;">{{$products[0]->titel}}</p>
            <h4>Tijdelijk €{{$products[0]->prijs}},- </h4>
        </div>
    </div>

    <span style="display:block; height: 35px;"></span>
    <h2>Aanbiedingen:</h2>
    <div class="overzicht">
        @foreach ($products as $product)
            <a href="{{route('cart.add', $product->id)}}">
                <div class="product">
                    <div class="product__image">
                        <img src="{{$product->photo}}" alt="product image">
                    </div>
                    <span class="product__price">Nu €{{$product->prijs}}</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
