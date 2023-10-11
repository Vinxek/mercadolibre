<x-app>
    <div class="container">
        <h1>Category Name: {{ $categoryName }}</h1>
        <product-category :products_data="{{ $products }}" />
    </div>
</x-app>
