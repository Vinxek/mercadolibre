<x-app title="Mercadolibre | Home">
    <div class="container">
        <section class="d-flex flex-wrap justify-content-center">
            @foreach ($products as $product)
                <div class="card mx-2 my-3 card_size">
                    <img src="{{ $product->file->route }}" class="card-img-top" alt="Product image">
                    <div class="card-body">
                        <p>{{ $product->format_description }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div class=""><button class="btn btn-primary">Add to cart</button></div>
                        <div class="">
                            <p><strong>{{ $product->price }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
</x-app>
