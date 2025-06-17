<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            background-color: #11151d;
        }

        body .container h1 {
            color: #ffffff;
        }

        .nav-link,
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link.show {
            border-bottom: none !important;
            text-decoration: none !important;
            box-shadow: none !important;
        }
        a {
            text-decoration: none !important;
            border-bottom: none !important;
            box-shadow: none !important;
        }
    </style>
  </head>

<body>
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-lg flex flex-col md:block hidden md:flex">
            <div class="flex items-center px-6 py-6 border-b">
                <span class="ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800" class="w-7 h-7" fill="none">
                        <path fill="#BFC6E4" d="M630.798 130.167a4.258 4.258 0 0 1 4.253 4.255v92.044H505.775v-96.299h125.023zM279.11 72.611a3.638 3.638 0 0 1 3.634-3.633h200.748a3.638 3.638 0 0 1 3.634 3.633V226.465H279.11V72.611z" />
                        <path fill="#787EBB" d="m675.457 456.83-.169.817c-4.093 25.569-6.17 25.835-14.803 26.518l-415.798 23.29c-4.543-.074-9.234-2.338-11.042-5.883l-.81-3.967v-.092l-48.123-235.681c-.109-3.759-.801-7.561-1.475-11.246-.291-1.621-.674-3.709-.902-5.471h534.16c5.364 0 9.789 4.112 10.286 9.35L675.457 456.83z" />
                        <path fill="#1D1751" d="M716.495 226.465h-62.794v-92.044c0-12.631-10.272-22.905-22.903-22.905H505.775V72.611c0-12.287-9.994-22.283-22.284-22.283H282.744c-12.289 0-22.284 9.997-22.284 22.283v153.854h-81.781c-.437 0-.768.107-1.18.133l-6.417-31.43c-1.167-5.715-1.268-14.702-4.066-19.914-6.406-11.928-28.928-16.368-40.67-21.438l-57.521-24.839c-10.904-4.709-20.413 11.354-9.413 16.104a2002499.926 2002499.926 0 0 0 76.733 33.135c2.079.898 9.903 4.787 13.703 5.941-.002.024.005.047.004.071-.289 3.814 1.856 9.093 2.622 12.842l9.176 44.941 4.426 21.675v.104l48.132 235.715a25.083 25.083 0 0 0 1.633 7.906l1.201 5.881L232.2 587.53c.811 3.971 5.101 6.846 8.992 6.846H672.146c12.001 0 12.021-18.65 0-18.65h-423.36l-10.257-50.233c2.062.394 4.195.614 6.385.614h.259l416.463-23.326.209-.016c22.798-1.801 27.438-14.737 31.791-41.753l51.839-204.402v-1.163c.001-15.98-12.998-28.982-28.98-28.982zm-85.697-96.298a4.258 4.258 0 0 1 4.253 4.255v92.044H505.775v-96.299h125.023zM279.11 72.611a3.638 3.638 0 0 1 3.634-3.633h200.748a3.638 3.638 0 0 1 3.634 3.633V226.465H279.11V72.611zM675.457 456.83l-.169.817c-4.093 25.569-6.17 25.835-14.803 26.518l-415.798 23.29c-4.543-.074-9.234-2.338-11.042-5.883l-.81-3.967v-.092l-48.123-235.681c-.109-3.759-.801-7.561-1.475-11.246-.291-1.621-.674-3.709-.902-5.471h534.16c5.364 0 9.789 4.112 10.286 9.35L675.457 456.83z" />
                        <path fill="#1D1751" d="M586.809 322.914H319.063c-12.001 0-12.021 18.65 0 18.65h267.746c12 .001 12.021-18.65 0-18.65zM566.588 411.23H339.283c-12 0-12.021 18.65 0 18.65h227.305c12.002 0 12.021-18.65 0-18.65zM344.13 749.672c30.73 0 55.727-25 55.727-55.727 0-30.727-24.997-55.727-55.727-55.727s-55.727 25-55.727 55.727c0 30.728 24.998 55.727 55.727 55.727zm0-92.804c20.444 0 37.077 16.633 37.077 37.077s-16.633 37.077-37.077 37.077-37.077-16.633-37.077-37.077 16.633-37.077 37.077-37.077zM613.469 693.945c0-30.727-24.997-55.727-55.727-55.727-30.73 0-55.727 25-55.727 55.727 0 30.728 24.997 55.727 55.727 55.727 30.729 0 55.727-24.999 55.727-55.727zm-92.805 0c0-20.444 16.633-37.077 37.077-37.077s37.077 16.633 37.077 37.077-16.633 37.077-37.077 37.077-37.077-16.633-37.077-37.077z" />
                        <circle fill="#83C9EF" cx="344.13" cy="693.945" r="37.077" />
                        <circle transform="rotate(-80.781 557.754 693.937)" fill="#83C9EF" cx="557.741" cy="693.945" r="37.077" />
                    </svg>
                </span>
                <span class="font-bold text-xl text-blue-700 ml-2 flex items-center">Cozy Mall</span>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="#" class="flex items-center px-4 py-2 rounded-lg bg-blue-100 text-blue-700 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Dashboard
                </a>
                <!-- Products collapsible -->
                <div x-data="{ open: true }" class="mt-6">
                    <div @click="open = !open" class="flex items-center justify-between cursor-pointer px-4 py-2 text-xs text-gray-400 hover:text-blue-700">
                        <span>Products</span>
                        <span x-text="open ? '▲' : '▼'"></span>
                    </div>
                    <div x-show="open" x-transition>
                        <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-200">
                            <span class="w-5 h-5 mr-2">⚠️</span> Create Product
                        </a>
                        <a href="{{ route('product.index') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-200">
                            <span class="w-5 h-5 mr-2">🔘</span> Products List
                        </a>
                    </div>
                </div>
                <!-- Categories collapsible -->
                <div x-data="{ open: true }" class="mt-6">
                    <div @click="open = !open" class="flex items-center justify-between cursor-pointer px-4 py-2 text-xs text-gray-400 hover:text-blue-700">
                        <span>Categories</span>
                        <span x-text="open ? '▲' : '▼'"></span>
                    </div>
                    <div x-show="open" x-transition>
                        <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-200">
                            <span class="w-5 h-5 mr-2">⚠️</span> Create Category
                        </a>
                        <a href="{{ route('category.index') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-200">
                            <span class="w-5 h-5 mr-2">⚠️</span> Category List
                        </a>
                    </div>
                </div>
            </nav>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">  
            <!-- Topbar -->
            <header class="flex items-center justify-between bg-white px-4 py-4 shadow">
                <div>
                    <!-- Sidebar Toggle Button (Collapsible) -->
                    <button
                        class="text-gray-400 focus:outline-none md:hidden"
                        x-data="{ openSidebar: true }"
                        @click="document.getElementById('sidebar').classList.toggle('hidden')"
                        aria-label="Toggle Sidebar">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></span>
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-10 h-10 rounded-full" alt="User">
                </div>
            </header>
            <main>
                <div class="container mx-auto px-6 py-6">
                    @yield('content')
                </div>
            </main>
</body>

</html>