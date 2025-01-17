<x-page_base_template>
    <x-slot name="title">
        Order
    </x-slot>

    @if(session('message'))
    @endif
    <div class="container">
        <h1>Order № {{$order->id}}</h1>
        <p>Total price: {{$order->total_amount}} euro</p>

        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-page_base_template>
