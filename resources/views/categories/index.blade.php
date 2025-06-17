@extends('layouts.dashboard') {{-- Assumes you have a base layout --}}
@section('title', 'Category Management')

{{-- Include any necessary styles or scripts --}}
@section('content')
<div class="container">
    <h2 class="mb-4">Category Management</h2>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Create Category Form --}}
    <div class="card mb-4">
        <div class="card-header">Add New Category</div>
        <div class="card-body">
            <form method="POST" action="{{ route('category.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug (optional)</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optional)</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent Category (optional)</label>
                    <select class="form-select" name="parent_id" id="parent_id">
                        <option value="">-- None --</option>
                        @foreach ($allCategories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Category</button>
            </form>
        </div>
    </div>

    {{-- Display Categories --}}
    <div class="card">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @if ($categories->isEmpty())
                <p>No categories available.</p>
            @else
                <ul>
                    @foreach ($categories as $category)
                        @include('categories.partials.category-item', ['category' => $category])
                    @endforeach
                </ul>
            @endif  
        </div>
    </div>
</div>
@endsection
