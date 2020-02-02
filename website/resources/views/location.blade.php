@extends('layouts.app')

@section('content')
<div class="location">
    <h2>Locatie</h2>
    <form action="{{route('paymethod')}}" method="post">
        <div class="inputdiv">
            <input placeholder="bv. 6969OK" type="text" name="postcode" id="" autocomplete="off" autofocus required value="{{$user->postcode ?? ''}}">
            <label for="postcode">Postcode*</label>
        </div>
        <div class="inputdiv">
            <input placeholder="bv. 420" type="text" name="huisnummer" id="" autocomplete="off" required value="{{$user->huisnummer ?? ''}}">
            <label for="huisnummer">Huisnummer*</label>
        </div>
        <div class="inputdiv">
            <input placeholder="bv. A" type="text" name="toevoegingen" id="" autocomplete="off" value="{{$user->toevoegingen ?? ''}}">
            <label for="toevoegingen">Toevoegingen (optioneel)</label>
        </div>
        <a href="{{route('cart')}}"><button type="button" style="background: #424242; cursor: pointer;" class="function">Vorige</button></a>
        <button type="submit" style="background: #FE2F90; float: right; cursor: pointer;" class="function">Volgende</button>
    </form>
</div>
@endsection