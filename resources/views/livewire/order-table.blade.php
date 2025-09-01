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
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-center">
                            @forelse($orders as $index => $order)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4">{{ $index + 1 }}</td>
                                <td class="p-4">{{ $order->shipment->tracking_number ?? '-' }}</td>
                                <td class="p-4">
                                    @foreach($order->items as $item)
                                    <div>
                                        {{ $item->product->name ?? 'Produk tidak ditemukan' }} x {{ $item->quantity }}
                                    </div>
                                    @endforeach
                                </td>
                                <td class="p-4 text-green-600 font-semibold">
                                    Rp {{ number_format($order->total_amount,0,',','.') }}
                                </td>
                                <td class="p-4">
                                    <span class="px-2 py-1 rounded-full text-white text-xs {{ $order->statusColor() }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    @if($order->payment)
                                    <span class="px-2 py-1 rounded-full text-white text-xs
            {{ $order->payment->status == 'success' ? 'bg-green-500' : 
               ($order->payment->status == 'failed' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                        {{ ucfirst(str_replace('_',' ',$order->payment->payment_method)) }} - {{
                                        ucfirst($order->payment->status) }}
                                    </span>
                                    @else
                                    <span class="px-2 py-1 rounded-full text-white text-xs bg-gray-400">Belum
                                        dibayar</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @if($order->shipment)
                                    <span
                                        class="px-2 py-1 rounded-full text-white text-xs 
                                                {{ $order->shipment->status == 'delivered' ? 'bg-green-500' : ($order->shipment->status == 'shipped' ? 'bg-blue-500' : 'bg-yellow-500') }}">
                                        {{ ucfirst($order->shipment->status) }}
                                    </span>
                                    @else
                                    <span class="px-2 py-1 rounded-full text-white text-xs bg-gray-400">Belum
                                        dikirim</span>
                                    @endif
                                </td>
                                <td class="p-4 flex justify-center space-x-2">
                                    <!-- Tombol Edit -->
                                    <div x-data="{ openModal: false }">
                                        <button @click="openModal = true"
                                            class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm mx-1 flex items-center space-x-1">
                                            <!-- Icon pensil -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                            <span>Edit</span>
                                        </button>

                                        <!-- Modal -->
                                        <div x-show="openModal" x-transition
                                            class="fixed inset-0 z-50 pt-40 flex items-start justify-center bg-opacity-40"
                                            x-cloak>
                                            <div @click.away="openModal = false"
                                                class="bg-white rounded-lg shadow-lg w-full max-w-md mx-2 p-6">

                                                <!-- Header -->
                                                <div class="flex justify-between items-center mb-4">
                                                    <h3 class="text-lg font-semibold text-gray-800">Edit Status</h3>
                                                    <button @click="openModal = false"
                                                        class="text-gray-500 hover:text-gray-700">&times;</button>
                                                </div>

                                                <!-- Body -->
                                                <form method="POST" s action="{{ route('order.update', $order->id) }}"
                                                    class="space-y-3">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <div class="mb-4 text-left">
                                                            <label
                                                                class="block text-sm font-medium text-gray-700">Status</label>
                                                            <select name="status"
                                                                class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none"
                                                                required>
                                                                <option value="pending" {{ $order->status ==
                                                                    'pending' ? 'selected' : '' }}>Pending
                                                                </option>
                                                                <option value="paid" {{ $order->status ==
                                                                    'paid' ? 'selected' : '' }}>Paid
                                                                </option>
                                                                <option value="shipped" {{ $order->status ==
                                                                    'shipped' ? 'selected' : '' }}>Shipped</option>
                                                                <option value="completed" {{ $order->status ==
                                                                    'completed' ? 'selected' : '' }}>Completed</option>
                                                                <option value="cancelled" {{ $order->status ==
                                                                    'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Footer -->
                                                    <div class="mt-4 flex justify-end space-x-2">
                                                        <button type="button" @click="openModal = false"
                                                            class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm">Batal</button>
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tombol Delete -->
                                    <form action="" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm mx-1 flex items-center space-x-1">
                                            Hapus
                                        </button>
                                    </form>
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