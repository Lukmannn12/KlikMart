<!-- Navbar -->
<nav class="fixed top-0 left-0 w-full bg-white shadow p-1 z-50">
    <div class="p-2 mx-auto flex items-center justify-between">

        <!-- Left: Logo -->
        <div class="flex items-center space-x-4">
            <a href="/" class="text-4xl font-bold text-green-600 px-3 tracking-widest">KlikMart</a>
        </div>

        <!-- Middle: Search Bar -->
        <div class="flex-1 mx-8">
            <div class="flex">
                <input type="text" placeholder="Cari di Klikmart....."
                    class="w-full text-sm font-medium text-lg border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-gray-200">
            </div>
        </div>

        <!-- Right: Icons + User -->
        <div class="flex items-center space-x-6">
            <!-- Cart -->
            <a href="/cart">
                <img width="30" height="30" src="https://img.icons8.com/dotty/80/shopping-cart.png"
                    alt="shopping-cart" />
            </a>
            <!-- Notifications -->
            <a href="/notifications">
                <img src="https://img.icons8.com/ios/24/appointment-reminders.png" alt="notification" class="w-6 h-6">
            </a>
            <!-- Messages -->
            <a href="/messages">
                <img src="https://img.icons8.com/ios/24/new-post.png" alt="email" class="w-6 h-6">
            </a>
            <!-- Profile -->
            <div>
                @auth
                @php
                $profile = Auth::user()->profile;
                @endphp
                <!-- User sudah login -->
                <div class="border-l px-4 border-gray-200" x-data="{ open: false }" @mouseenter="open = true"
                    @mouseleave="open = false">

                    <!-- Trigger -->
                    <button class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 transition w-full">
                        <img src="{{ $profile && $profile->image 
                            ? asset('storage/' . $profile->image) 
                            : 'https://i.pravatar.cc/100?u=' . auth()->user()->id }}" alt="Profile"
                            class="w-10 h-10 rounded-full">
                        <span class="text-gray-700 font-medium">
                            {{ auth()->user()->name}}
                        </span>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open"
                        class="mt-2 bg-white shadow-md rounded-lg py-2 w-44 absolute right-5 z-50 border border-gray-200"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95">

                        <a href="{{ route('profile.show') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 text-sm font-medium">Profile</a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 text-sm font-medium">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

                @else
                <!-- User belum login -->
                <div class="flex items-center space-x-4 px-10 border-l border-gray-200">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded-lg text-green-600 text-sm font-bold border border-green-500 hover:bg-green-50 transition">
                        Masuk
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-4 py-2 rounded-lg text-white bg-green-600 text-sm font-bold border border-green-500 hover:bg-green-700 transition">
                        Daftar
                    </a>
                </div>
                @endauth
            </div>

        </div>
    </div>
</nav>