<x-layouts.app title="Cart">
    <div class="mx-auto p-6 flex flex-col lg:flex-row gap-6">

        <!-- List Produk -->
        <div class="flex-1 space-y-6">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                @if(count($cartItems) > 0)
                @foreach($cartItems as $item)
                <div class="bg-white border border-gray-300 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="font-semibold">{{ $item->product->name }}</h2>
                        <div>
                            <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" {{-- ID CartItem --}}
                                data-subtotal="{{ $item->subtotal }}" {{-- tambahin subtotal di data-* --}}
                                class="w-5 h-5 item-checkbox">
                            <a href="#" class="text-green-600 text-sm"></a>
                        </div>
                    </div>

                    <div class="flex items-center first:border-t-0 py-3 space-x-3">

                        <div class="flex-1">
                            <div class="text-sm font-medium">Qty: {{ $item->quantity }}</div>
                            <div class="flex items-center gap-3 mt-1 text-gray-600">
                                <img src="{{ asset('images/default-product.png') }}"
                                    class="w-14 h-14 object-cover rounded" alt="product">
                                <span class="text-sm">{{ $item['name'] }}</span>
                            </div>
                        </div>
                        <div class="text-right text-sm font-semibold">
                            Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                            <div class="text-green-600 text-xs mt-1">

                            </div>
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
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-md">
                <h3 class="text-xl font-semibold mb-6 border-b pb-3">🛒 Ringkasan Belanja</h3>
                <div class="space-y-4">
                    <!-- Metode Pembayaran -->
                    <div class="space-y-1 ">
                        <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                        <select name="payment_method" required
                            class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:ring-green-500 focus:border-green-500">
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="ewallet">E-Wallet</option>
                            <option value="cod">COD (Bayar di Tempat)</option>
                        </select>
                    </div>
    
                    <!-- Kurir -->
                    <div class="space-y-1 pb-5">
                        <label class="block text-sm font-medium text-gray-700">Pilih Kurir</label>
                        <select name="courier" required
                            class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:ring-green-500 focus:border-green-500">
                            <option value="jne">JNE</option>
                            <option value="jnt">J&T</option>
                            <option value="pos">POS Indonesia</option>
                            <option value="sicepat">SiCepat</option>
                        </select>
                    </div>
                </div>

                <!-- Total -->
                <div class="border-t pt-4 space-y-2">
                    <div class="flex justify-between text-gray-600 text-sm">
                        <span>Subtotal</span>
                        <span>Rp <span id="subtotalHarga">0</span></span>
                    </div>
                    <div class="flex justify-between text-gray-600 text-sm">
                        <span>Ongkir</span>
                        <span>Rp 10.000</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold text-green-600 border-t pt-3">
                        <span>Total</span>
                        <span>Rp <span id="totalHarga">0</span></span>
                    </div>
                </div>

                <!-- Hidden total -->
                <input type="hidden" name="total_amount" id="totalInput" value="0">

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl mt-3">Checkout</button>
            </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let checkboxes = document.querySelectorAll(".item-checkbox");
            let subtotalElement = document.getElementById("subtotalHarga");
            let totalElement = document.getElementById("totalHarga");
            let totalInput = document.getElementById("totalInput");
            let ongkir = 10000;

            function updateTotal() {
                let subtotal = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        subtotal += parseInt(checkbox.dataset.subtotal); 
                    }
                });

                subtotalElement.textContent = new Intl.NumberFormat('id-ID').format(subtotal);
                totalElement.textContent = new Intl.NumberFormat('id-ID').format(subtotal + ongkir);
                totalInput.value = subtotal + ongkir;
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", updateTotal);
            });

            updateTotal();
        });

    </script>


</x-layouts.app>