@extends('layouts.app')

@section('content')
<div class="register">
    <div class="signupform">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="ding">
                <label for="fname">Name*</label>
                <input type="text" id="fname" name="name" required>
                @error('name')
                    <span class="error">{{$message}}</span>
                @enderror

                <label for="fname">Email*</label>
                <input type="text" id="fname" name="email" required>
                @error('email')
                    <span class="error">{{$message}}</span>
                @enderror

                <label for="lname">Telefoonnummer</label>
                <input type="text" id="lname" name="telefoonnummer">
                @error('telefoonnummer')
                    <span class="error">{{$message}}</span>
                @enderror

                <label for="lname">Huisnummer</label>
                <input type="text" id="lname" name="huisnummer">
                @error('huisnummer')
                    <span class="error">{{$message}}</span>
                @enderror
                <div class="Signup">
                    <button class="active">Sign up</button>
                </div>
            </div>

            <div class="ding">
                <label for="lname">Wachtwoord*</label>
                <input type="password" id="lname" name="password" required>
                @error('password')
                    <span class="error">{{$message}}</span>
                @enderror

                <label for="lname">Postcode</label>
                <input type="text" id="lname" name="postcode">
                @error('postcode')
                    <span class="error">{{$message}}</span>
                @enderror

                <label for="lname">Toevoegingen</label>
                <input type="text" id="lname" name="toevoegingen">
                @error('toevoegingen')
                    <span class="error">{{$message}}</span>
                @enderror
            </div>
        </form>
    </div>
    <div class="text">
        <h1>Sign Up Nu!</h1>
        <h4>Voor alle onnodige artikelen die wij jou helemaal dood gaan spammen! Oh wat leuk!!</h4>
    </div>
</div>
@endsection
