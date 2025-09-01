<div>
    <!-- Filter Tab -->
    <div class="flex space-x-3 mb-6">
        @foreach(['all','processing','shipped','delivered'] as $status)
        <button wire:click="setStatus('{{ $status }}')" class="px-4 py-2 rounded-lg font-semibold text-sm
        {{ $statusFilter == $status ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700' }}
        transition-colors duration-200
        hover:brightness-90 hover:scale-105">
            {{ ucfirst($status) }}
        </button>
        @endforeach
    </div>

    @if($orders->isEmpty())
    <p class="text-gray-500">Belum ada pesanan.</p>
    @else
    <div class="space-y-6">
        @foreach($orders as $order)
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
            <!-- Header Order -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-xl text-gray-800"> Pesanan #{{ $order->shipment->tracking_number ?? $order->id
                    }}</h2>
                <span class="text-sm text-gray-500">{{ $order->created_at->format('d/m/Y H:i') }}</span>
            </div>

            <!-- Produk List -->
            <div class="mb-4 space-y-3">
                @foreach($order->orderItems as $item)
                <div
                    class="flex items-center justify-between bg-gray-50 rounded-lg p-3 hover:shadow-sm transition-shadow">
                    <div class="flex items-center space-x-3">
                        @if($item->product && $item->product->image)
                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                            class="w-16 h-16 object-cover rounded-md">
                        @else
                        <div
                            class="w-16 h-16 bg-gray-200 flex items-center justify-center rounded-md text-gray-400 text-xs">
                            No Image
                        </div>
                        @endif
                        <div class="space-y-2">
                            <p class="font-semibold text-sm text-gray-800">{{ $item->product->name ?? 'Produk tidak
                                ditemukan' }}</p>
                            <p class="text-sm text-gray-500">Jumlah: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <div class="font-semibold text-gray-800">
                        Rp {{ number_format($item->price,0,',','.') }}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Total & Status -->
            <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-2 md:space-y-0 mb-4">
                <div class="text-lg font-bold text-green-600">
                    Total: Rp {{ number_format($order->total_amount,0,',','.') }}
                </div>

                <div class="flex flex-wrap gap-2">
                    <span
                        class="px-3 py-1 rounded-full text-white text-xs {{ $order->status == 'selesai' ? 'bg-green-500' : 'bg-yellow-500' }}">
                        {{ ucfirst($order->status) }}
                    </span>

                    @if($order->payment)
                    <span
                        class="px-3 py-1 rounded-full text-white text-xs {{ $order->payment->status == 'paid' ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ ucfirst(str_replace('_',' ',$order->payment->payment_method)) }} - {{ $order->payment->status
                        }}
                    </span>
                    @else
                    <span class="px-3 py-1 rounded-full text-white text-xs bg-gray-400">Belum dibayar</span>
                    @endif

                    @if($order->shipment)
                    <span
                        class="px-3 py-1 rounded-full text-white text-xs
                                    {{ $order->shipment->status == 'processing' ? 'bg-yellow-500' : ($order->shipment->status == 'shipped' ? 'bg-blue-500' : 'bg-green-500') }}">
                        {{ strtoupper($order->shipment->courier) }} - {{ $order->shipment->status }}
                    </span>
                    @else
                    <span class="px-3 py-1 rounded-full text-white text-xs bg-gray-400">Belum dikirim</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>