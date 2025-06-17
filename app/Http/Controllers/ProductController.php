<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = DB::table("products")
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();
        $data['categories'] = DB::table("categories")->get();
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/products', 'public');
        }

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'created_at' => now(),
            'updated_at' => now(),
            'image' => $imagePath,
            'is_active' => $request->is_active ? 1 : 0,
            'stock' => $request->stock,
        ];

        $inserted = DB::table('products')->insert($data);

        if ($inserted) {
            // Return newly created product or all products
            $products = DB::table('products')->get(); // or just return $data
            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
                'products' => $products
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create product'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['products'] = DB::table("products")->find($id);
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
        ];
        $product = DB::table('products')->where('id', $id)->update($data);
        if ($product) {
            return redirect()->route('product.index')->with('success', 'Product updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update product');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = DB::table('products')->where('id', $id)->delete();
        if ($product) {
            return redirect()->route('product.index')->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete product');
        }
    }

    public function json()
    {
        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get()
            ->map(function ($product) {
                $product->image = asset('storage/' . $product->image);
                return $product;
            });
        return response()->json($products);
    }

    public function toggleActive(Request $request, $id)
    {
        $isActive = $request->input('is_active') ? 1 : 0;
        DB::table('products')->where('id', $id)->update(['is_active' => $isActive]);
        return response()->json(['success' => true]);
    }
}
