<x-layouts.app title="Daftar">
    <div class="p-10">
        <h1 class="text-4xl font-bold text-center text-green-600 tracking-widest">KlikMart</h1>
        <div class="flex items-center justify-center pt-5">
            <div class="max-w-6xl w-full flex items-center justify-between p-6">
                <!-- Left Side -->
                <div class="w-1/2 flex flex-col items-center text-center">
                    <!-- Logo KlikMart -->


                    <!-- Illustration -->
                    <img src="{{ asset('gambar/banner4.png') }}" alt="KlikMart Illustration" class="w-80 mb-6">

                    <!-- Text -->
                    <h2 class="text-2xl font-bold tracking-tight">Jual Beli Mudah Hanya di KlikMart</h2>
                    <p class="text-gray-600 mt-2 text-sm tracking-tighter">Gabung dan rasakan kemudahan bertransaksi di
                        KlikMart</p>
                </div>

                <!-- Right Side: Register Form -->
                <div class="w-1/2 flex justify-center">
                    <div class="bg-white shadow-md rounded-lg text-center p-8 w-full max-w-md">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Daftar Sekarang</h2>
                        <p class="text-sm text-gray-600 mb-6">
                            Sudah punya akun KlikMart?
                            <a href="/login" class="text-green-600 font-medium hover:underline">Masuk</a>
                        </p>

                        <!-- Google Button -->
                        <button
                            class="w-full flex items-center justify-center font-bold text-gray-500 border border-gray-300 rounded-lg py-4 hover:bg-gray-50 mb-4">
                            <img src="https://img.icons8.com/color/24/google-logo.png" class="mr-2" />
                            Google
                        </button>

                        <!-- Divider -->
                        <div class="flex items-center my-7">
                            <hr class="flex-grow border-gray-300">
                            <span class="px-2 text-gray-500 text-sm">atau</span>
                            <hr class="flex-grow border-gray-300">
                        </div>

                        <!-- Input -->
                        <form id="registerForm" action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="mb-4 text-left">
                                <label class="block text-sm font-medium text-gray-700 mb-1 py-2">Nama</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="lukman"
                                    class="w-full border border-gray-300 text-sm rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-green-500"
                                    required>
                                @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 text-left">
                                <label class="block text-sm font-medium text-gray-700 mb-1 py-2">E-mail</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="contoh: email@klikmart.com"
                                    class="w-full border border-gray-300 text-sm rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-green-500"
                                    required>
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6 text-left">
                                <label class="block text-sm font-medium text-gray-700 mb-1 py-2">Password</label>
                                <input type="password" name="password" placeholder="••••••••"
                                    class="w-full border border-gray-300 text-sm rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-green-500"
                                    required>
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6 text-left">
                                <label class="block text-sm font-medium text-gray-700 mb-1 py-2">Konfirmasi
                                    Password</label>
                                <input type="password" name="password_confirmation" placeholder="••••••••"
                                    class="w-full border border-gray-300 text-sm rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-green-500"
                                    required>
                            </div>

                            <button type="submit"
                                class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold transition">
                                Daftar
                            </button>
                        </form>


                        <p class="text-xs text-gray-500 mt-6">
                            Dengan mendaftar, saya menyetujui
                            <a href="#" class="text-green-600 font-medium hover:underline">Syarat & Ketentuan</a> serta
                            <a href="#" class="text-green-600 font-medium hover:underline">Kebijakan Privasi
                                KlikMart</a>.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-6 text-gray-500 text-sm">
        © 2009-2025, PT KlikMart | <a href="#" class="text-green-600 hover:underline">KlikMart Care</a>
    </footer>


    <script>
        const emailInput = document.getElementById('emailInput');
    const submitBtn = document.getElementById('submitBtn');

    emailInput.addEventListener('input', () => {
        if (emailInput.validity.valid) {
            submitBtn.disabled = false;
            submitBtn.classList.remove("bg-gray-200", "text-gray-500", "cursor-not-allowed");
            submitBtn.classList.add("bg-green-600", "text-white", "cursor-pointer", "hover:bg-green-700");
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add("bg-gray-200", "text-gray-500", "cursor-not-allowed");
            submitBtn.classList.remove("bg-green-600", "text-white", "cursor-pointer", "hover:bg-green-700");
        }
    });
    </script>

</x-layouts.app>