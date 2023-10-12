<x-app title="Mercadolibre | Home">
    <div class="container">
        <section class="d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category)
                <div class="container">
                    <h1><a class="text-decoration-none link-secondary"
                            href="{{ route('categories.index', ['categoryName' => $category->category_name]) }}">{{ $category->category_name }}</a>
                    </h1>
                    <div class="d-flex flex-wrap justify-content-center">
                        @php $count = 0 @endphp
                        @foreach ($products as $product)
                            @if ($product->category_id == $category->id && $count < 5)
                                <div class="card mx-2 my-3 card_size">
                                    <img src="{{ $product->file->route }}" class="card-img-top" alt="Product image">
                                    <div class="card-body">
                                        <p><strong>{{ $product->product_name }}</strong></p>
                                        <p>{{ $product->format_description }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                                class="btn btn-primary">Product Page</a>
                                        </div>
                                        <div class="">
                                            <p><strong>${{ $product->price }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                                @php $count++ @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
    </div>
</x-app>
