<nav class="bg-white shadow p-4 flex justify-between items-center">
    <!-- Tombol sidebar -->
    <button onclick="toggleSidebar()" class="text-gray-600 hover:text-black">
        ☰
    </button>
    <div class="flex items-center space-x-4">
        <div id="clock" class="font-semibold"></div>
    
        <!-- Profil Admin -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                <!-- Avatar Profil -->
                <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" class="w-8 h-8 rounded-full"
                    alt="Admin">
                <span class="text-sm text-gray-700"> Halo,  👋</span>
            </button>
    
            <!-- Dropdown -->
            <div x-show="open" @click.away="open = false"
                class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg py-1 z-20">
    
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>


    <script>
    function updateClock() {
        const now = new Date();
        const time = now.toLocaleTimeString();
        const date = now.toLocaleDateString('id-ID', {
            day: '2-digit', month: 'short', year: 'numeric'
        });
        document.getElementById('clock').innerText = `${time} | ${date}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
</nav>