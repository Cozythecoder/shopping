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

<!-- Modal -->
<div id="product-modal" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs bg-opacity-40 hidden transition-opacity duration-300 opacity-0">
    <div id="modal-content" class="bg-white rounded-lg shadow-lg max-w-2xl w-full p-6 text-left relative transform scale-95 opacity-0 transition-all duration-300">
        <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Left: Image and details -->
            <div class="md:w-1/2 w-full flex flex-col items-center">
                <img id="modal-image" src="" alt="" class="w-full h-56 object-cover rounded mb-4">
                <h2 id="modal-title" class="text-xl font-bold mb-2 text-center"></h2>
                <p id="modal-description" class="text-gray-700 mb-2 text-center"></p>
                <ul class="text-gray-700 mb-2 text-center">
                    <li><strong>Category:</strong> <span id="modal-category"></span></li>
                </ul>
                <p class="text-lg font-bold mt-2 text-center">$<span id="modal-price"></span></p>
            </div>
            <!-- Right: Store info, merchant, cart, payment -->
            <div class="md:w-1/2 w-full flex flex-col justify-between">
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-800 mb-2">Store Location</h3>
                    <p id="modal-store-location" class="text-gray-600 text-sm">123 Main St, City, Country</p>
                </div>
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-800 mb-2">Merchant</h3>
                    <p id="modal-merchant" class="text-gray-600 text-sm">YourCompany</p>
                </div>
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-800 mb-2">Cart</h3>
                    <button id="add-to-cart" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Add to Cart</button>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Payment</h3>
                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 w-full">Proceed to Payment</button>
                </div>
            </div>
        </div>
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
                productElement.className = 'bg-gray-800 shadow-md rounded-lg p-4 cursor-pointer transition hover:shadow-xl';
                productElement.innerHTML = `
        <img src="${product.image}" 
             alt="${product.title}" 
             class="w-full h-48 object-cover rounded-t-lg mb-4"
        />
        <h2 class="text-white text-lg font-bold mb-2">${product.name}</h2>
        <p class="text-white text-lg font-bold mt-2">$${Number(product.price).toFixed(2)}</p>
        <p class="text-gray-400 mb-4">${product.category_name}</p>
        `;  
                productElement.addEventListener('click', function(e) {
                    if (!e.target.classList.contains('view-details')) {
                        showModal(product);
                    }
                });
                container.appendChild(productElement);
            });
        });

    function showModal(product) {
        document.getElementById('modal-image').src = product.image;
        document.getElementById('modal-title').textContent = product.name;
        document.getElementById('modal-description').textContent = product.description;
        document.getElementById('modal-category').textContent = product.category_name || 'Unknown Category';
        document.getElementById('modal-price').textContent = Number(product.price).toFixed(2);

        // Example static info, replace with dynamic if available
        document.getElementById('modal-store-location').textContent = product.store_location || '123 Main St, City, Country';
        document.getElementById('modal-merchant').textContent = product.merchant || 'YourCompany';

        const modal = document.getElementById('product-modal');
        const modalContent = document.getElementById('modal-content');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100');
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('product-modal');
        const modalContent = document.getElementById('modal-content');
        modal.classList.remove('opacity-100');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    document.getElementById('close-modal').addEventListener('click', closeModal);

    document.getElementById('product-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Example: Add to cart button
    document.addEventListener('click', function(e) {
        if (e.target && e.target.id === 'add-to-cart') {
            alert('Added to cart!');
        }
    });
</script>
@endsection