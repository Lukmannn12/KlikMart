<div>
    <div class="mx-auto" x-data="{ loading: true, loadingTable: true }"
        x-init="setTimeout(() => { loading = false; loadingTable = false }, 500)">

        <!-- Judul -->
        <h1
            class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent inline-block">
            Dashboard <span class="text-gray-400">→</span> Transaksi <span class="text-gray-400">→</span>
            Orders
        </h1>

        <!-- Table Section -->
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <div>
                <!-- Header Action -->
                <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                    <!-- Search Box -->
                    <div>
                        <template x-if="loadingTable">
                            <div class="w-48 h-8 bg-gray-200 rounded animate-pulse"></div>
                        </template>
                        <template x-if="!loadingTable">
                            <input type="text" wire:model.debounce.300ms="search" placeholder="Cari order..."
                                class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-gray-300">
                        </template>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 text-center">
                            <tr>
                                <th class="p-4">No</th>
                                <th class="p-4">Tracking #</th>
                                <th class="p-4">Produk</th>
                                <th class="p-4">Total</th>
                                <th class="p-4">Status Order</th>
                                <th class="p-4">Payment</th>
                                <th class="p-4">Shipment</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-center">
                            @forelse($orders as $index => $order)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4">{{ $index + 1 }}</td>
                                    <td class="p-4">{{ $order->shipment->tracking_number ?? '-' }}</td>
                                    <td class="p-4">
                                        @foreach($order->orderItems as $item)
                                            <div>
                                                {{ $item->product->name ?? 'Produk tidak ditemukan' }} x {{ $item->quantity }}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="p-4 text-green-600 font-semibold">
                                        Rp {{ number_format($order->total_amount,0,',','.') }}
                                    </td>
                                    <td class="p-4">
                                        <span class="px-2 py-1 rounded-full text-white text-xs
                                            {{ $order->status == 'selesai' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        @if($order->payment)
                                            <span class="px-2 py-1 rounded-full text-white text-xs 
                                                {{ $order->payment->status == 'paid' ? 'bg-green-500' : 'bg-red-500' }}">
                                                {{ ucfirst(str_replace('_',' ',$order->payment->payment_method)) }} - {{ $order->payment->status }}
                                            </span>
                                        @else
                                            <span class="px-2 py-1 rounded-full text-white text-xs bg-gray-400">Belum dibayar</span>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        @if($order->shipment)
                                            <span class="px-2 py-1 rounded-full text-white text-xs 
                                                {{ $order->shipment->status == 'delivered' ? 'bg-green-500' : ($order->shipment->status == 'shipped' ? 'bg-blue-500' : 'bg-yellow-500') }}">
                                                {{ ucfirst($order->shipment->status) }}
                                            </span>
                                        @else
                                            <span class="px-2 py-1 rounded-full text-white text-xs bg-gray-400">Belum dikirim</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-6 text-gray-500">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    {{-- <div class="px-6 py-4">
                        {{ $orders->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
