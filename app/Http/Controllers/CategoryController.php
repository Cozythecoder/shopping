<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $allCategories = Category::all();
        // Logic to retrieve and display categories
        return view('categories.index', [
            'categories'=> $categories,
            'allCategories' => $allCategories,
        ]);

    }
    public function create()
    {
        // Logic to show the form for creating a new category
        return view('categories.create');
    }
    public function store(Request $request)
    {
        // Logic to store a new category
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }
    public function edit($id)
    {
        // Logic to show the form for editing an existing category
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        // Logic to update an existing category
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'slug' => "required|string|max:255|unique:categories,slug,{$category->id}",
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        // Logic to delete an existing category
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    public function show($id)
    {
        // Logic to display a single category
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }
    public function search(Request $request)
    {
        // Logic to search categories
        $query = $request->input('query', '');
        $categories = Category::where('name', 'like', "%{$query}%")->get();

        return view('categories.search', compact('categories'));
    }
    public function filter(Request $request)
    {
        // Logic to filter categories based on criteria
        $criteria = $request->input('criteria', '');
        $categories = Category::where('name', 'like', "%{$criteria}%")->get();

        return view('categories.filter', compact('categories'));
    }
    public function sort(Request $request)
    {
        // Logic to sort categories
        $sortBy = $request->input('sort_by', 'name');
        $categories = Category::orderBy($sortBy)->get();

        return view('categories.sort', compact('categories'));
    }
    public function paginate(Request $request)
    {
        // Logic to paginate categories
        $perPage = $request->input('per_page', 10);
        $categories = Category::paginate($perPage);

        return view('categories.paginate', compact('categories'));
    }
}
