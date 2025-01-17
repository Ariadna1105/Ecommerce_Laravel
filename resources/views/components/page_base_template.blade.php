<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title || 'Ecommerse'}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav>
    <a href="{{ route('products.index') }}">Products</a>
    <a href="{{ route('categories.index') }}">Categories</a>
    @auth
        <a href="{{ route('cart.index') }}">Cart</a>
        <div class="text-sm text-gray-500">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
</nav>
<hr>
<div>
    @if(session('message'))
        <div>{{session('message')}}</div>
    @endif
</div>
{{$slot}}
</body>
<hr>
<footer>MMXXIV</footer>
</html>
