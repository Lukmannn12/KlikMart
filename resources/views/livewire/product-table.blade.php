<div>
    <!-- Search -->
    <div class="mb-4 flex items-center gap-2">
        <input type="text" wire:model.live="search" placeholder="Search product..."
            class="px-3 py-1 border rounded w-64">
        <!-- Filter Kategori -->
        <button wire:click="filterByCategory(null)" class="px-3 py-1 bg-gray-300 rounded">All</button>
        @foreach($categories as $category)
        <button wire:click="filterByCategory({{ $category->id }})" class="px-3 py-1 bg-blue-500 text-white rounded">
            {{ $category->name }}
        </button>
        @endforeach
    </div>

    <!-- Tabel Produk -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $product->id }}</td>
                    <td class="px-4 py-2 border">{{ $product->name }}</td>
                    <td class="px-4 py-2 border">{{ $product->description }}</td>
                    <td class="px-4 py-2 border">${{ $product->price }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 border text-center">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>