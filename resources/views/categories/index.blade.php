<x-app>
    <div class="container">
        <h1>Category Name: {{ $categoryName }}</h1>
        <section class="d-flex flex-wrap justify-content-center">
            @foreach ($products as $product)
                @if ($product->category->category_name === $categoryName)
                    <section class="d-flex flex-wrap justify-content-center">
                        <div class="card mx-2 my-3 card_size flex-wrap justify-content-center">
                            <img src="{{ $product->file->route }}" class="card-img-top" alt="product image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Price: ${{ $product->price }}</p>
                                <p class="card-text">Stock: {{ $product->stock }}</p>
                                <p class="card-text">Category: {{ $product->category->category_name }}</p>
                            </div>
                        </div>
                    </section>
                @endif
            @endforeach
        </section>
    </div>
</x-app>
