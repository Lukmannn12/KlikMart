<x-layouts.app title="Cart">
    <div class="container mx-auto p-6 flex flex-col lg:flex-row gap-6">

        <!-- List Produk -->
        <div class="flex-1 space-y-6">

            @php
                $cart = session()->get('cart', []);
            @endphp

            @if(count($cart) > 0)
                @foreach($cart as $id => $item)
                    <div class="bg-white border border-gray-300 rounded-lg p-4">
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="font-semibold">{{ $item['name'] }}</h2>
                            <a href="#" class="text-green-600 text-sm"></a>
                        </div>

                        <div class="flex items-center first:border-t-0 py-3 space-x-3">
                            <input type="checkbox" class="w-4 h-4">
                            <div class="flex-1">
                                <div class="text-sm font-medium">Qty: {{ $item['quantity'] }}</div>
                                <div class="flex items-center gap-3 mt-1 text-gray-600">
                                    <img src="{{ asset('images/default-product.png') }}" class="w-14 h-14 object-cover rounded" alt="product">
                                    <span class="text-sm">{{ $item['name'] }}</span>
                                </div>
                            </div>
                            <div class="text-right text-sm font-semibold">
                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                <div class="text-green-600 text-xs mt-1">
                                    <a href="#">Lihat Produk Serupa</a>
                                </div>
                            </div>
                            <div class="ml-3">
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-gray-400 hover:text-red-500">
                                        🗑
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center text-gray-500 py-10">
                    Keranjang belanja Anda kosong.
                </div>
            @endif

        </div>

        <!-- Ringkasan Belanja -->
        <div class="w-full lg:w-1/3 bg-white rounded-lg p-4 border border-gray-300">
            <h3 class="font-semibold mb-3">Ringkasan Belanja</h3>

            @php
                $total = 0;
                foreach($cart as $item) {
                    $total += $item['price'] * $item['quantity'];
                }
            @endphp

            <div class="text-gray-600 text-sm mb-3">Total: Rp {{ number_format($total, 0, ',', '.') }}</div>

            <button class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg {{ $total > 0 ? '' : 'cursor-not-allowed bg-gray-300 text-gray-500' }}">
                Beli
            </button>
        </div>

    </div>
</x-layouts.app>
