@extends('layouts.app')
@section('title')
Dashboards
@endsection

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .container {
            background-color: #11151d;
            color: #ffffff;
        }

        /* Add to your <style> section */
        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 22px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 22px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #22c55e;
        }

        input:checked+.slider:before {
            transform: translateX(18px);
        }
    </style>
</head>

@section('body')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Current Listing</h1>
    <p class="mb-4">Here you can view and manage your products.</p>
    <a href="{{ route('product.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create New Product</a>
    <a href="{{ route('product.index') }}" class="mb-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">View All Products</a>
    <p class="mb-4">You can also search for products by name:</p>
    <input type="text" id="search-input" class="mb-4 p-2 border border-gray-300 rounded w-full" placeholder="Search products by name...">
    <script>
        $(document).ready(function() {
            // Fetch products via AJAX
            $.getJSON("{{ route('product.json') }}", function(products) {
                const activeProducts = products.filter(product => product.is_active);
                let html = '';
                activeProducts.forEach(function(product) {
                    html += `
                        <div class="product-item bg-gray-800 p-4 rounded shadow">
                            <h2 class="product-name text-lg font-semibold mb-2">${product.name}</h2>
                            <p class="product-description text-gray-400 mb-2">${product.description}</p>
                            <p class="product-price text-green-400 mb-2">Price: $${Number(product.price).toFixed(2)}</p>
                            <p class="product-stock text-yellow-400 mb-2">Stock: ${product.stock}</p>
                            <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover rounded mb-2"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <div style="display:none;" class="animate-pulse no-image bg-gray-700 text-white text-center w-full h-48 flex flex-col items-center justify-center rounded mb-2">
                            No image available
                        </div>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex space-x-2">
                                    <a href="/product/${product.id}/edit" class="btn btn-primary btn-sm bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                                    <a href="/product/${product.id}/delete" class="btn btn-danger btn-sm bg-red-500 text-white px-2 py-1 rounded">Delete</a>
                                </div>
                                <label class="switch ml-4">
                                    <input type="checkbox" class="toggle-active" data-id="${product.id}" ${product.is_active ? 'checked' : ''}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    `;
                });
                $('#products-list').html(html);
            });

            // Search functionality (already present)
            $('#search-input').on('input', function() {
                const query = $(this).val().toLowerCase();
                $('.product-item').each(function() {
                    const productName = $(this).find('.product-name').text().toLowerCase();
                    if (productName.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            $(document).on('change', '.toggle-active', function() {
                const productId = $(this).data('id');
                const isActive = $(this).is(':checked') ? 1 : 0;
                $.ajax({
                    url: `/product/${productId}/toggle-active`,
                    method: 'POST',
                    data: {
                        is_active: isActive,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Optionally show a message or update UI
                    }
                });
            });
        });
    </script>
    <p class="mb-4">Active products:</p>
    <div id="products-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Products will be loaded here by JavaScript -->
    </div>
</div>
@endsection