@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="css/winkelwagen.css">
@endsection

@section('content')
<div class="winkelmandje">
    <hr>
    <div class="contents">
        <h2>Winkelmandje</h2>
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td class="product">{{$product->titel}}</td>
                    <td class="price">€{{$product->price}}</td>
                    <td class="quantity">
                        {{$product->quantity}}
                    </td>
                    <td class="total">€{{$product->price * $product->quantity}}</td>
                    <td><a href="{{ route('cart.delete', $product->id)}}"><img class="cross" src="img/cross.svg"></td>
                </tr>
            @endforeach
            <tr class="last">
                <td></td>
                <td></td>
                <td></td>
                <td class="total">€{{ $total }}</td>
            </tr>
        </table>
    </div>
    <div class="sidebar">
        <h3>Bestelling</h3>
        @if (count($products))
        <table>
            <tr class="products">
                <td class="item">Producten</td>
                <td class="price">€{{$total}}</td>
            </tr>
            <tr class="shipping">
                <td class="item">Shipping</td>
                <td class="price">€3</td>
            </tr>
            <tr class="total">
                <td class="item">Totaal</td>
                <td class="price">€{{$total + 3}}</td>
            </tr>
        </table>
        <a href="">
            <button>
                Volgende
            </button>
        </a>
        @else
            Je hebt nog geen producten geselecteerd.<br><br>
            <a href="{{ route('menu') }}" style="color: #FE2F90;">Terug naar menu</a>
        @endif
    </div>
</div>
@endsection