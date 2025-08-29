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
</head>

<body class="bg-white min-h-screen flex flex-col">



    <!-- Navbar -->
    @include('components.navbar.index')

    <!-- Main Content -->
    <main class="container mx-auto p-4 flex-grow mt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('components.footer.index')

    @fluxScripts

    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Alert Message --}}
    @if(session('success'))
    <div id="toast"
        class="fixed top-20 right-5 z-[9999] bg-white shadow-2xl text-green-500 tracking-wide font-semibold text-sm px-5 py-3 rounded shadow-md flex items-center justify-between min-w-[200px] opacity-0 transition-opacity duration-500 ease-in-out">
        <span>{{ session('success') }}</span>
        <button onclick="hideToast()" class="ml-3 text-green-300 hover:text-green-500 font-bold">
            &times;
        </button>
    </div>

    <script>
        const toast = document.getElementById('toast');

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
        setTimeout(() => toast.style.display = 'none', 500); // tunggu animasi selesai
    }
    </script>
    @endif

</body>

</html>