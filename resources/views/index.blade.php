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
fetch("https://fakestoreapi.com/products")
    .then(res => res.json())
    .then(products => {
        const container = document.getElementById('products-list');
        container.innerHTML = products.map(product => `
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="${product.image}" 
                     alt="${product.title}" 
                     class="w-full h-48 object-cover rounded-t-lg mb-4"
                    
                <h2 class="text-xl font-semibold mb-2">${product.title}</h2>
                <p class="text-gray-600 mb-2">${product.description}</p>
                <ul class="text-sm text-gray-700 mb-2">
                    <li><strong>ID:</strong> ${product.id}</li>
                    <li><strong>Category:</strong> ${product.category && product.category.name ? product.category.name : '-'}</li>
                </ul>
                <p class="text-lg font-bold mt-2">$${Number(product.price).toFixed(2)}</p>
                <a href="#" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Details</a>
            </div>
        `).join('');
    });
</script>
@endsection