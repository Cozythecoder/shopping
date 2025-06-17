@extends('layouts.dashboard')

@section('title', 'Product Management')
@section('content')
<div class="container mx-auto p-4">
    @if(session('success')) 
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
        <button id="add-product-btn" class="btn btn-primary">Add New Product</button>
    </div>
    <div class="overflow-x-auto border border-gray-700 rounded-lg shadow-md">
        <table id="products-table" class="w-full text-sm bg-white border-separate border-spacing-0">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-1 px-2 border border-gray-700">Name</th>
                    <th class="py-1 px-2 border border-gray-700">Description</th>
                    <th class="py-1 px-2 border border-gray-700">Category</th>
                    <th class="py-1 px-2 border border-gray-700">Price</th>
                    <th class="py-1 px-2 border border-gray-700">Image</th>
                    <th class="py-1 px-2 border border-gray-700">Stock</th>
                    <th class="py-1 px-2 border border-gray-700">Is Active</th>
                    <th class="py-1 px-2 border border-gray-700" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="text-center">
                    <td class="py-1 px-2 border border-gray-700">{{ $product->name }}</td>
                    <td class="py-1 px-2 border border-gray-700">{{ $product->description }}</td>
                    <td>
                        <select name="category_id" data-product-id="{{ $product->id }}" class="category-select">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td class="py-1 px-2 border border-gray-700">${{ number_format($product->price, 2) }}</td>
                    <td class="py-1 px-2 border border-gray-700">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mx-auto rounded" style="width: 50px; height: auto;">
                    </td>
                    <td class="py-1 px-2 border border-gray-700">{{ $product->stock }}</td>
                    <td class="py-1 px-2 border border-gray-700">
                        <input type="checkbox" {{ $product->is_active ? 'checked' : '' }} disabled>
                    </td>
                    <td class="py-1 px-2 border border-gray-700">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td class="py-1 px-2 border border-gray-700">
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('add-product-btn').addEventListener('click', function() {
        const tbody = document.querySelector('#products-table tbody');
        // Only allow one new row at a time
        if (document.getElementById('new-product-row')) return;

        const newRow = document.createElement('tr');
        newRow.id = 'new-product-row';
        newRow.className = 'text-center bg-yellow-50';

        newRow.innerHTML = `
            <td class="py-1 px-2 border border-gray-700"><input type="text" name="name" class="form-input w-full" required></td>
            <td class="py-1 px-2 border border-gray-700"><input type="text" name="description" class="form-input w-full"></td>
            <td class="py-1 px-2 border border-gray-700">
                <select name="category_id" class="form-input w-full" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </td>
            <td class="py-1 px-2 border border-gray-700"><input type="number" name="price" class="form-input w-full" min="0" step="0.01" required></td>
            <td class="py-1 px-2 border border-gray-700"><input type="file" name="image" accept="image/*" class="form-input w-full"></td>
            <td class="py-1 px-2 border border-gray-700"><input type="number" name="stock" class="form-input w-full" min="0" required></td>
            <td class="py-1 px-2 border border-gray-700 text-center">
                <input type="checkbox" name="is_active" checked>
            </td>
            <td class="py-1 px-2 border border-gray-700" colspan="2">
                <button type="button" class="btn btn-success btn-sm mr-2" id="save-new-product">Save</button>
                <button type="button" class="btn btn-danger btn-sm" id="cancel-new-product">Cancel</button>
            </td>
        `;

        tbody.prepend(newRow);

        // Cancel button handler
        document.getElementById('cancel-new-product').onclick = function() {
            newRow.remove();
        };

        // Save handler
        document.getElementById('save-new-product').onclick = function() {
            // Collect data from inputs
            const inputs = newRow.querySelectorAll('input, textarea');
            const formData = new FormData();
            inputs.forEach(input => {
                if (input.type === 'file' && input.files[0]) {
                    formData.append(input.name, input.files[0]);
                } else if (input.type === 'checkbox') {
                    formData.append(input.name, input.checked ? 1 : 0);
                } else {
                    formData.append(input.name, input.value);
                }
            });

            // Collect category_id from select
            const categorySelect = newRow.querySelector('select[name="category_id"]');
            if (categorySelect) {
                formData.append('category_id', categorySelect.value);
            }

            fetch("{{ route('product.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to add product');
                    }
                })
                .catch(() => alert('Failed to add product'));
        };
    });
</script>
@endsection