<x-app title="Users">
    <div class="container my-5">

        <div class="d-flex justify-content-center my-4">
            <h1>ProductList</h1>
        </div>

        <product-list :products="{{ $products }}" />
        {{-- :products  is the prop sent to vue AND $products is the value that comes from
			the controller. which comes from the DB as an object --}}

    </div>
</x-app>
