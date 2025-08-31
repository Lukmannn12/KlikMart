<div id="sidebar" class="w-64 flex flex-col bg-white h-screen shadow-md transition-all duration-300"
    x-data="{ openProduk: false, openTransaksi: false, openUser: false, openLaporan: false }">

    <!-- Logo -->
    <div class="p-6 flex items-center space-x-3 border-b border-gray-200">
        <img src="/logo.png" alt="Logo" class="w-10 h-10 rounded-full">
        <span class="text-xl font-bold text-gray-800">KlikMart</span>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-3 py-6" x-data="{ openProduk: false, openTransaksi: false, openUser: false }">

        <ul class="space-y-2">

            <!-- Dashboard -->
            <li class="pb-5">
                <a href="{{ route('dashboard.index') }}"
                    class="flex items-center px-3 py-2 rounded-lg transition
                    {{ request()->is('dashboard') ? 'bg-green-400 text-white font-semibold' : 'text-gray-800 hover:bg-gray-100 hover:text-blue-600' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9.75L12 4l9 5.75V20a2 2 0 01-2 2H5a2 2 0 01-2-2V9.75z" />
                    </svg>
                    <span class="ml-2 text-sm">Dashboard</span>
                </a>
            </li>

            <!-- Produk -->
            <li class="border-t border-b border-gray-200 py-2"
                x-data="{ openProduk: {{ request()->is('dashboard/product*') || request()->is('dashboard/category*') ? 'true' : 'false' }} }">

                <button @click="openProduk = !openProduk" class="flex items-center justify-between w-full px-3 py-2 rounded-lg  
        {{ request()->is('dashboard/product*') || request()->is('dashboard/category*') 
            ? 'bg-green-400 text-white' 
            : 'text-gray-800 hover:bg-green-400 hover:text-white' }} transition">

                    <div class="flex items-center space-x-2">
                        <!-- Ikon Produk -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V7a2 2 0 00-2-2h-4l-2-2-2 2H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2z" />
                        </svg>
                        <span class="text-sm">Manajemen Produk</span>
                    </div>

                    <svg :class="{'rotate-90': openProduk}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <ul x-show="openProduk" x-transition class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="{{ route('product.index') }}"
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg transition 
                {{ request()->is('dashboard/product*') ? 'bg-green-400 text-white' : 'text-gray-600 hover:bg-green-400 hover:text-white' }}">
                            <!-- Ikon produk list -->
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}"
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg transition 
                {{ request()->is('dashboard/category*') ? 'bg-green-400 text-white' : 'text-gray-600 hover:bg-green-400 hover:text-white' }}">
                            <!-- Ikon kategori -->
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h10M7 12h4m-2 5h8" />
                            </svg>
                            <span>Kategori Produk</span>
                        </a>
                    </li>
                </ul>
            </li>




            <!-- Transaksi -->
            <li class="py-2 border-b border-gray-200">
                <button @click="openTransaksi = !openTransaksi"
                    class="flex items-center justify-between w-full text-sm px-3 py-2 rounded-lg text-gray-800 hover:bg-green-400 hover:text-white">
                    <span class="flex items-center">
                        <!-- Icon Transaksi (shopping cart) -->
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2h6v2m-7-8h8M5 8h14l1 12H4L5 8z" />
                        </svg>
                        Transaksi
                    </span>
                    <svg :class="{ 'rotate-90': openTransaksi }" class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <ul x-show="openTransaksi" x-transition class="mr-3 ml-6 mt-3 space-y-3 text-sm">
                    <!-- Orders -->
                    <li>
                        <a href="{{ url('/orders') }}"
                            class="flex items-center gap-2 block px-3 py-1 rounded-lg hover:bg-green-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                            </svg>
                            <span>Orders</span>
                        </a>
                    </li>

                    <!-- Payments -->
                    <li>
                        <a href="{{ url('/payments') }}"
                            class="flex items-center gap-2 block px-3 py-1 rounded-lg hover:bg-green-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2m4-5h-8m0 0l3-3m-3 3l3 3" />
                            </svg>
                            <span>Payments</span>
                        </a>
                    </li>

                    <!-- Shipments -->
                    <li>
                        <a href="{{ url('/shipments') }}"
                            class="flex items-center gap-2 block px-3 py-1 rounded-lg hover:bg-green-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h2l.4 2M7 13h10l4-8H5.4M7 13l-1.2 6h12.4L17 13M7 13H5.4M17 13h1.6" />
                            </svg>
                            <span>Shipments</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- User -->
            <li class="py-2 border-b border-gray-200">
                <button @click="openUser = !openUser"
                    class="flex items-center text-sm justify-between w-full px-3 py-2 rounded-lg text-gray-800 hover:bg-green-400 hover:text-white">
                    <span class="flex items-center">
                        <!-- Ikon utama User -->
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 1118.88 6.197 9 9 0 015.121 17.804z" />
                        </svg>
                        User
                    </span>
                    <!-- Ikon toggle -->
                    <svg :class="{ 'rotate-90': openUser }" class="w-4 h-4 transform transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <ul x-show="openUser" x-transition class="mr-3 ml-6 mt-3 space-y-3 text-sm">
                    <!-- Daftar User -->
                    <li>
                        <a href="{{ url('/users') }}"
                            class="flex items-center gap-2 block px-3 py-1 rounded-lg hover:bg-green-400 hover:text-white">
                            <!-- Ikon Daftar User -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m10-4a4 4 0 11-8 0 4 4 0 018 0zM7 9a4 4 0 118 0 4 4 0 01-8 0z" />
                            </svg>
                            <span>Daftar User</span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
    </nav>
</div>