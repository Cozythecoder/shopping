@extends('layouts.app')
@section('title')
Shopping
@endsection

@section('navbar_home_bg', 'bg-gray-900')

@section('body')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    <div id="products-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Products will be loaded here by JavaScript -->
    </div>
</div>
<script>
    fetch("/product/json")
        .then(res => res.json())
        .then(products => {
            const activeProducts = products.filter(product => product.is_active);
            const container = document.getElementById('products-list');
            if (activeProducts.length === 0) {
                container.innerHTML = '<p class="text-white text-center">No active products available.</p>';
                return;
            }
            container.innerHTML = '';
            activeProducts.forEach(product => {
                const productElement = document.createElement('div');
                productElement.className = 'bg-gray-800 shadow-md rounded-lg p-4';
                productElement.innerHTML = `
        <img src="${product.image}" 
             alt="${product.title}" 
             class="w-full h-48 object-cover rounded-t-lg mb-4"
        />
        <h2 class="text-white text-lg font-bold mb-2">${product.name}</h2>
        <p class="text-white text-sm text-gray-700 mb-2">
            <strong>Description:</strong> ${product.description}
        </p>
        <ul class="text-white text-sm text-gray-700 mb-2">
            <li><strong>Category:</strong> ${product.category && product.category.name ? product.category.name : '-'}</li>
        </ul>
        <p class="text-white text-lg font-bold mt-2">$${Number(product.price).toFixed(2)}</p>
        <a href="#" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Details</a>
                `;
                container.appendChild(productElement);
            });
        });
</script>
@endsection