<x-page_base_template>
    <x-slot name="title">
        Products
    </x-slot>
    <div class="container">
        <h1>Products:</h1>
        @foreach($products as $product)
            <div class="p-2">
                <h2>{{$product->name}}</h2>
                <p>{{$product->price}}</p>
                <a href="{{route('products.show', $product->id)}}">More info</a>
            </div>
        @endforeach
    </div>
</x-page_base_template>


