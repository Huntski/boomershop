<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="">
    <title>BoomerShop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>

    <header>
        <div class="title">
            <a href="/">
                <h1>BoomerShop</h1>
            </a>
        </div>
        <div class="middle">
            <ul>
                <a href="/menu"><li class="@if(\Request::route()->getName()=='menu') active @endif">Menu</li></a>
            </ul>
        </div>
        <div class="right">
            <a href="/winkelmandje">
                <div class="cart">
                    <img src="img/shoppingcart.png" alt="shopping cart icon">
                    <span>
                        @php
                            use App\Shoppingcart;
                            $Shoppingcart = new Shoppingcart;
                        @endphp
                        {{ $Shoppingcart->count() }}
                    </span>
                </div>
            </a>

            @guest
            <a href="login"><button>Sign in</button></a>
            <a href="register"><button class="active">Sign up</button></a>
            @else
            <a href="{{route('account.show')}}"><button class="name" style="text-decoration: none; color: #fff">{{auth()->user()->name ?? ''}}</button></a>
            <button>logout</button>
            @endguest
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&#169; 2019 BoomerShop - Amsterdam</p>
    </footer>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
    @yield('scripts')
    <script>
        function logout () {
            event.preventDefault()
            document.querySelector('#logout-form').submit()
        }
    </script>
</html>
