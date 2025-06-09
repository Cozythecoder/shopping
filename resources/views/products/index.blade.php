<h2>Product List</h2>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Stock</th>
            <th>Is_Active</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 100px; height: auto;">
            </td>
            <td>{{ $product->stock }}</td>
            <td>
                <input type="checkbox" {{ $product->is_active ? 'checked' : '' }} disabled>

            <td>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
            </td>
            <td>
                <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-primary btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>