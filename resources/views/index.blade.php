<x-app title="Mercadolibre | Home">
    <div class="container">
        <section class="d-flex flex-wrap justify-content-center">

            @foreach ($categories as $category)
                <div class="container">
                    <h1>{{ $category->category_name }}</h1>

                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach ($products as $product)
                            @if ($product->category_id == $category->id)
                                <div class="card mx-2 my-3 card_size">
                                    <img src="{{ $product->file->route }}" class="card-img-top" alt="Product image">
                                    <div class="card-body">
                                        <p>{{ $product->format_description }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                                class="btn btn-primary">Product Page</a>
                                        </div>
                                        <div class="">
                                            <p><strong>{{ $product->price }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
    </div>
</x-app>
