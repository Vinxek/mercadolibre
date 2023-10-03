<x-app title="Mercadolibre | Home">



    <section class="d-flex flex-wrap justify-content-center">
        @foreach ($products as $product)
            <div class="card mx-2 my-3 card_size">
                <div class="card-header">
                    <h2 class="h5">{{ $product->product_name }}</h2>
                </div>
                <div class="card-body">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div class=""><button class="btn btn-primary">Add to cart</button></div>
                    <div class="">
                        <p><strong>${{ $product->price }}</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </section>


</x-app>
