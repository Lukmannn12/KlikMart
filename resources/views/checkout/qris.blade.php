<x-layouts.app title="Pembayaran QRIS">
    <div class="mx-auto p-6 rounded-2xl border border-gray-200">
        {{-- Status Transaksi --}}
        <div
            class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 border-b border-b-gray-300 border-gray-700 pb-4">
            <div class="space-y-2">
                <h2 class="text-xl font-semibold ">Transaksi Dibuat</h2>
                <p class="text-sm text-gray-500">Transaksi berhasil dibuat, silakan lakukan pembayaran sebelum waktu
                    habis.</p>
            </div>
            <div class="mt-3 md:mt-0 bg-pink-600 px-4 py-2 rounded-full font-bold text-center text-sm">
                2 Jam 59 Menit 41 Detik
            </div>
        </div>

        {{-- Informasi Pesanan + Pembayaran --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Informasi Pembeli --}}
            <div class=" border border-gray-200 p-5 rounded-2xl">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-6 border-b border-b-gray-200 pb-3">Informasi Pembeli</h2>

                    <div class="rounded-xl px-5 py-2 flex gap-4 items-center">
                        <img src="{{ $payment->order->items[0]->product->image_url ?? 'https://via.placeholder.com/80' }}"
                            alt="Produk" class="w-20 h-20 rounded-lg object-cover ">
                        <div class="space-y-2 tracking-wider">
                            <h3 class="text-md">{{ $payment->order->user->name }}</h3>
                            <p class="text-sm">
                                Kategori: {{ $payment->order->items[0]->product->category->name ?? '-' }}
                            </p>
                            <p class="text-sm">
                                Qty: {{ $payment->order->items[0]->quantity }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Metode Pembayaran --}}
            <div class="border border-gray-200 p-5 rounded-2xl">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-6 border-b border-b-gray-200 pb-3">Metode Pembayaran</h2>

                    <div class="rounded-xl px-5 py-2 space-y-2 tracking-wider">
                        <p class="text-sm font-semibold">
                            Metode Pembayaran: <span> {{ $payment->payment_method ?? '-' }}</span>
                        </p>
                        <p class="text-sm font-semibold">
                            Nomor Invoice: <span>{{ $payment->invoice_number ?? '-' }}</span>
                        </p>
                        <p class="text-sm font-semibold">
                            Status:
                            <span class="px-3 py-1 rounded text-xs font-bold  
                    {{ $payment->status === 'paid' ? 'bg-green-600 text-white' : 'bg-yellow-500 text-black' }}">
                                {{ strtoupper($payment->status) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Rincian Pembayaran + QRIS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            {{-- Rincian Pembayaran --}}
            <div class="border border-gray-200 p-5 rounded-2xl">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-6 border-b border-b-gray-200 pb-3">Rincian Pembayaran</h2>

                    <div class="rounded-xl p-5 space-y-3 tracking-wider">
                        <div class="flex justify-between">
                            <span>Harga Satuan</span>
                            <span>Rp {{ number_format($payment->amount / max($payment->quantity,1), 0, ',', '.')
                                }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Jumlah</span>
                            <span>{{ $payment->order->items[0]->quantity }}x</span>
                        </div>
                        <div class="flex justify-between font-semibold border-t border-gray-300 pt-3">
                            <span>Total</span>
                            <span class="text-green-600">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- QRIS --}}
            <div class="rounded-xl p-5 text-center">
                <h3 class="font-semibold text-lg mb-4">Scan QRIS untuk Membayar</h3>
                @if($payment->qris_url)
                <img src="{{ $payment->qris_url }}" alt="QRIS Code"
                    class="mx-auto mb-4 w-64 h-64 rounded-lg">
                @else
                <p class="text-red-500">QRIS tidak tersedia</p>
                @endif

                <a href="{{ $payment->qris_url }}" download
                    class="inline-block mt-3 tex-xs bg-green-500 hover:bg-green-700 transition px-5 py-2 rounded-lg text-white">
                    Unduh Kode QR
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>