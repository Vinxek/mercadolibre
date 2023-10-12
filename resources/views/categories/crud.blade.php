<x-app>
    <div class="container my-5">

        <div class="d-flex justify-content-center my-4">
            <h1>Categories</h1>
        </div>

        <category-list :categories_data="{{ $categories }}" />

    </div>
</x-app>
