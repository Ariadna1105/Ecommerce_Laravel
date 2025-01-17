<x-page_base_template>
    <x-slot name="title">
        Cart
    </x-slot>

    <div class="container">
        <h1>Cart:</h1>

        @if(session('message')) {
        <div class="accent-red-400">
            {{session('message')}}
        </div>
        }
        @endif
        @if($items->count())
            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->product->name}}</td>
                        <td>
                            <form action=" {{route('cart.update', $item->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="number" name="quantity" value="{{$item->quantity}}" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>
                            {{$item->product->price}} euro.
                        </td>
                        <td>
                            {{$item->product->price * $item->quantity}} euro.
                        </td>
                        <td>
                            <form action="{{route('cart.remove', $item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form action="{{route('orders.checkout')}}" method="post">
                @csrf
                <button type="submit">Checkout</button>
            </form>
        @else
            <div>
                Your cart is empty.
            </div>
        @endif
    </div>
</x-page_base_template>
