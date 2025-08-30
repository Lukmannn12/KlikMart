<x-layouts.app title="Detail Produk">
    <div class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Bagian Gambar -->
        <div>
            <img src="{{ asset($product->image ?? 'gambar/default.png') }}" alt="{{ $product->name }}"
                class="w-full h-80 object-cover rounded-lg mb-2">

            <!-- Thumbnail -->
            <div class="flex space-x-2 mt-2">
                @foreach($product->images ?? [] as $img)
                <img src="{{ asset($img) }}" alt="Thumbnail"
                    class="w-16 h-16 object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-blue-500">
                @endforeach
            </div>
        </div>

        <!-- Bagian Info -->
        <div>
            <h1 class="text-2xl font-bold mb-2">{{ $product->slug }}</h1>
            <div class="flex items-center space-x-5">
                <p class="text-sm text-gray-500">Hemat s.d. 5%</p>
                <div class="flex items-center text-yellow-500 text-sm">
                    ⭐ 4.9 • 10rb+ terjual
                </div>
            </div>
            <p class="text-gray-600 py-3">Kategori: {{ $product->category->name }}</p>

            <!-- Harga -->
            <div class="flex items-center space-x-3 mb-4">
                <p class="text-red-600 font-semibold text-3xl py-3">Rp{{ number_format($product->price,0,',','.') }}</p>
            </div>

            <!-- Stok & tombol beli -->
            <div class="mb-4">
                <p>Stok: {{ $product->stock }}</p>
                <!-- Deskripsi -->
                <div class="py-5">
                    <h3 class="font-semibold mb-2">Deskripsi Produk</h3>
                    <p class="text-gray-700">{{ $product->description }}</p>
                </div>
            </div>

            <div class="flex space-x-5 py-10">
                @auth
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        + Keranjang
                    </button>
                </form>
                @endauth

                @guest
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-sm font-semibold text-white rounded-lg">
                        + Keranjang
                    </button>
                </form>
                @endguest
                <button
                    class="px-4 py-2 border text-sm font-semibold border-green-600 text-green-600 rounded-lg hover:bg-green-50">Beli
                    Sekarang</button>
            </div>

        </div>
    </div>
</x-layouts.app>