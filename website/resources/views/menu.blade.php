@extends('layouts.app')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css?family=Quicksand&display=swap');

    img {
        width: 250px;
    }

    .menu {
        display: flex;
        justify-content: center;
    }

    .row-outside {
        display: flex;
        flex-direction: row;
        border: 1px solid black;
        width: 400px;
        margin: 30px;
    }

    .content {
        color: black;
        text-transform: uppercase;
    }

    .gerecht {
        display: flex;
        flex-direction: column;

        margin: 20px;
    }

    p {
        color: black;
        text-decoration: none;
    }

    a {
        text-decoration: none;
    }

    .naastelkaar {
        display: flex;
        flex-direction: row;
        padding-top: 50px;
        align-items: center;
    }

    .bestel {
        height: 30px;
        margin-right: 10px;
        background-color:#FE2F90;
        border: none;
        border-radius: 30px;
        color: white;
        width: 70px;
        cursor: pointer;
    }

    .flex-start {
        display: flex;
        justify-content: start;
    }
    .row-master {
        display: flex;
        flex-direction: row;
    }
</style>
@endsection

@section('content')
<div class="menu">
    @foreach($products as $product)
    <div class="row-master">
        <div class="row-outside">
            <img src="{{$product->photo}}">
            <div class="gerecht">
                <div class="felx-start">
                    <div class="content">{{$product->titel}}</div>
                </div>
                <div class="naastelkaar">
                    <a href="{{route('cart.add', $product->id)}}">
                        <button class="bestel">Bestel</button>
                    </a>
                    <p>€{{$product->prijs}}-</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection