<div class="container">
    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" required></textarea>
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" step="0.01" required>
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image" accept="image/*" required>
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" min="0" required>
            <label for="is_active" class="form-label">Is Active</label>
            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
