<x-page_base_template>
    <x-slot name="title">
        Categories
    </x-slot>

    <div class="container">
        <h1>Categories:</h1>
        <div class="p-2">
            @foreach($categories as $category)
                <li>
                    <a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
                </li>
            @endforeach
        </div>
    </div>
</x-page_base_template>
