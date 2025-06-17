@extends('layouts.dashboard')
@section('title')
Dashboards
@endsection

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Dashboards</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-2">Total Users</h2>
            <p class="text-3xl font-bold">1,234</p>
        </div>
        <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-2">Total Products</h2>
            <p class="text-3xl font-bold">567</p>
        </div>
        <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-2">Total Orders</h2>
            <p class="text-3xl font-bold">890</p>
        </div>
        <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-2">Total Revenue</h2>
            <p class="text-3xl font-bold">$12,345.67</p>
        </div>
    </div>

@endsection