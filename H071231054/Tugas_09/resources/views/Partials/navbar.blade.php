<nav class="bg-[#50a7af]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-white font-bold text-2xl flex items-center">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-12 mr-2">
                    Smart Store
                </a>                
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('products.index') }}"
                       class="{{ request()->is('products*') ? 'bg-[#367a7f] text-white' : 'text-gray-100' }} hover:bg-[#367a7f] hover:text-white px-3 py-2 rounded-md text-lg font-medium">
                       Produk
                    </a>
                    <a href="{{ route('categories.index') }}"
                       class="{{ request()->is('categories*') ? 'bg-[#367a7f] text-white' : 'text-gray-100' }} hover:bg-[#367a7f] hover:text-white px-3 py-2 rounded-md text-lg font-medium">
                       Kategori
                    </a>
                    <a href="{{ route('inventory-logs.index') }}"
                       class="{{ request()->is('inventory-logs*') ? 'bg-[#367a7f] text-white' : 'text-gray-100' }} hover:bg-[#367a7f] hover:text-white px-3 py-2 rounded-md text-lg font-medium">
                       Log Inventaris
                    </a>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <button type="button"
                        class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('products.index') }}"
               class="{{ request()->is('products*') ? 'bg-gray-700 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
               Produk
            </a>
            <a href="{{ route('categories.index') }}"
               class="{{ request()->is('categories*') ? 'bg-gray-700 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
               Kategori
            </a>
            <a href="{{ route('inventory-logs.index') }}"
               class="{{ request()->is('inventory-logs*') ? 'bg-gray-700 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
               Log Inventaris
            </a>
        </div>
    </div>
</nav>
