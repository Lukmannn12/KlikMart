<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }} | KlikMart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    <script defer>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-ml-64');
        }
    </script>
</head>

<body class="flex">
    @include('components.dashboard.sidebar.index')

    <div class="flex-1 flex flex-col">
        {{-- navbar --}}

        @include('components.dashboard.layouts.navbar')

        {{-- Main Content --}}
        <main class="p-6">
            {{ $slot }}
        </main>

    </div>

    @fluxScripts


{{-- Toast Notification --}}
@if(session('success') || session('error'))
    <div id="toast"
        class="fixed top-20 right-5 z-[9999]
        {{ session('success') ? 'text-green-600 border-green-300' : 'text-red-600 border-red-300' }}
        bg-white border shadow-lg tracking-wide font-medium text-sm px-5 py-3 rounded-lg flex items-center justify-between min-w-[250px] opacity-0 transition-opacity duration-500 ease-in-out">

        <span>{{ session('success') ?? session('error') }}</span>
        <button onclick="hideToast()"
            class="ml-3 {{ session('success') ? 'text-green-400 hover:text-green-600' : 'text-red-400 hover:text-red-600' }} font-bold">
            &times;
        </button>
    </div>

    <script>
        const toast = document.getElementById('toast');

        if (toast) {
            // Fade in
            setTimeout(() => {
                toast.classList.add('opacity-100');
            }, 100);

            // Auto fade out
            setTimeout(() => {
                hideToast();
            }, 3000);

            function hideToast() {
                toast.classList.remove('opacity-100');
                toast.classList.add('opacity-0');
                setTimeout(() => toast.style.display = 'none', 500);
            }
        }
    </script>
@endif




</body>

</html>