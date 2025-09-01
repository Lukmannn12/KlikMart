<div>
    <div class="mx-auto" x-data="{ loading: true, loadingTable: true }"
        x-init="setTimeout(() => { loading = false; loadingTable = false }, 500)">

        <!-- Judul -->
        <h1
            class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent inline-block">
            Dashboard <span class="text-gray-400">→</span> Transaksi <span class="text-gray-400">→</span>
            Shipments
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
                            <input type="text" wire:model.live="search" placeholder="Cari Nama..."
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
                                <th class="p-4">Order ID</th>
                                <th class="p-4">Courier</th>
                                <th class="p-4">Tracking Number</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Shipped At</th>
                                <th class="p-4">Delivered At</th>
                            </tr>


                        </thead>
                        <tbody class="divide-y divide-gray-200 text-center">
                            @forelse($shipments as $index => $shipment)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4">{{ $shipments->firstItem() + $index }}</td>
                                <td class="p-4">{{ $shipment->order->user->name ?? '-' }}</td>
                                <td class="p-4">{{ $shipment->courier ?? '-' }}</td>
                                <td class="p-4">{{ $shipment->tracking_number ?? '-' }}</td>
                                <td class="p-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-white text-xs
                                {{ $shipment->status == 'success' ? 'bg-green-500' : ($shipment->status == 'failed' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                        {{ ucfirst($shipment->status) }}
                                    </span>
                                </td>
                                <td class="p-4">{{ $shipment->shipped_at?->format('d/m/Y H:i') ?? '-' }}</td>
                                <td class="p-4">{{ $shipment->delivered_at?->format('d/m/Y H:i') ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-6 text-gray-500">Tidak ada data shipments</td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="px-6 py-4">
                        {{ $shipments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>