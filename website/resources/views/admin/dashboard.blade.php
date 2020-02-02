<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="dashboard">
        <div class="dashboard__options">
        <h1>Dashboard</h1>
        <form action="{{ route('admin.store') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($product__inputs as $input)
            <div class="form__item-box">
                <span class="form__span">{{$input->name}}</span>
                <input class="form__input" type="{{ $input->type }}" @if($input->required) required @endif autocomplete="off" autofocus name="{{$input->name}}" value="{{@old($input->name)}}" step="any" placeholder="{{$input->placeholder}}">

                @error($input->name)
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @endforeach

            <button type='submit'>submit</button>
        </form>

        <a type="button" onclick="logout()">logout</a>
        </div>

        <div class="dashboard__products">
            @foreach($products as $product)
            <div class="product">
                <span class="product__title">{{$product->titel}}</span>
                <form method="post" action="{{route('admin.delete')}}">
                    @csrf
                    <input type="text" name="product_id" style="display: none;" value="{{$product->id}}">
                    <button>x</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
    <script>
        function logout () {
            event.preventDefault()
            document.querySelector('#logout-form').submit()
        }
    </script>
</html>