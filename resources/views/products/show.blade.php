<x-page_base_template>
    <x-slot name="title">
        {{$product->name}}
    </x-slot>

    <div class="container">
        <h1>Product: {{$product->name}}</h1>
        <p>{{$product->description}}</p>
        <p>Price: {{$product->price}} euro.</p>
        @auth
            <form action="{{route('cart.add', $product->id)}}" method="post">
                @csrf
                <button type="submit">Add to cart</button>
            </form>
        @else
            <p>You need to be logged in to add products to the cart.</p>
            <a href="{{route('login')}}">Login</a>
        @endauth
    </div>
</x-page_base_template>
