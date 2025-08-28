<!-- Navbar -->
<nav class="bg-white shadow p-3">
    <div class="p-2 mx-auto flex items-center justify-between">

        <!-- Left: Logo -->
        <div class="flex items-center space-x-4">
            <a href="/" class="text-4xl font-bold text-green-600">Klikmart</a>
        </div>

        <!-- Middle: Search Bar -->
        <div class="flex-1 mx-8">
            <div class="flex">
                <input type="text" placeholder="Cari di Klikmart"
                    class="w-full font-semibold text-lg border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-gray-200">
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
                <div class="border-l px-10 border-gray-200">
                    <a href="/profile"
                        class="flex items-center space-x-5 cursor-pointer border-gray-200 hover:bg-gray-100 p-2 rounded-lg">
                        <img src="https://i.pravatar.cc/40" alt="Profile" class="w-8 h-8 rounded-full">
                        <span class="text-gray-700 font-medium">Lukman</span>
                    </a>
            </div>
        </div>

    </div>
</nav>