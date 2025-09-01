<div>
    <div class="mx-auto" x-data="{ loading: true, loadingTable: true, openModal: false }"
        x-init="setTimeout(() => { loading = false; loadingTable = false }, 1500)">

        <!-- Judul -->
        <h1
            class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
            Dashboard <span class="text-gray-400">→</span> Manajemen Produk <span class="text-gray-400">→</span>
            Produk
        </h1>

        <!-- Table Section -->
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <div>
                <!-- Header Action -->
                <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                    {{-- Tambah Data --}}
                    <div>
                        <!-- Tombol Tambah -->
                        <template x-if="!loadingTable">
                            <button @click="openModal = true"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm shadow">
                                + Tambah Produk
                            </button>
                        </template>

                        <!-- Modal -->
                        <div x-show="openModal" class="fixed inset-0 z-50 pt-40 flex items-start justify-center"
                            x-transition>
                            <div @click.away="openModal = false"
                                class="bg-white w-full max-w-md rounded-2xl shadow-lg p-6 relative">

                                <h2 class="text-lg font-semibold text-gray-800 mb-4">Tambah Kategori</h2>

                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Pilih Kategori -->
                                    <div class="mb-4 text-left">
                                        <label class="block text-sm font-medium text-gray-700">Kategori</label>
                                        <select name="category_id" required
                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Nama Produk -->
                                    <div class="mb-4 text-left">
                                        <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                        <input type="text" name="name" required
                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="mb-4 text-left">
                                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                        <textarea name="description" rows="3"
                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none"></textarea>
                                    </div>

                                    <!-- Harga -->
                                    <div class="mb-4 text-left">
                                        <label class="block text-sm font-medium text-gray-700">Harga</label>
                                        <input type="number" name="price" min="0" required
                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                    </div>

                                    <!-- Stok -->
                                    <div class="mb-4 text-left">
                                        <label class="block text-sm font-medium text-gray-700">Stok</label>
                                        <input type="number" name="stock" min="0" required
                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                    </div>

                                    <!-- Gambar -->
                                    <div class="mb-4 text-left">
                                        <label class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                                        <input type="file" name="image"
                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                    </div>

                                    <div class="flex justify-end space-x-2">
                                        <button type="button" @click="openModal = false"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg text-sm">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm">
                                            Simpan
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                    <!-- Search Box -->
                    <div>
                        <template x-if="loadingTable">
                            <div class="w-48 h-8 bg-gray-200 rounded animate-pulse"></div>
                        </template>
                        <template x-if="!loadingTable">
                            <input type="text" wire:model.live="search" placeholder="Cari kategori..."
                                class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-gray-300">
                        </template>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 text-center">
                            <tr>
                                <th class="p-4 font-medium">No</th>
                                <th class="p-4 font-medium">Kategori</th>
                                <th class="p-4 font-medium">Nama Produk</th>
                                <th class="p-4 font-medium">Deskripsi</th>
                                <th class="p-4 font-medium">Harga</th>
                                <th class="p-4 font-medium">Stok</th>
                                <th class="p-4 font-medium">Gambar</th>
                                <th class="p-4 font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-center">
                            @if($products->isEmpty())
                            <tr>
                                <td colspan="8" class="py-6 text-gray-500">Tidak ada data</td>
                            </tr>
                            @else
                            @foreach ($products as $product)
                            <tr>
                                <td class="p-4">
                                    {{ $products->firstItem() + $loop->index }}
                                </td>
                                <td class="p-4">
                                    {{ $product->category->name ?? '-' }}
                                </td>
                                <td class="p-4">{{ $product->name }}</td>
                                <td class="p-4">{{ Str::limit($product->description, 30) }}</td>
                                <td class="p-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="p-4">{{ $product->stock }}</td>
                                <td class="p-4">
                                    @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="image"
                                        class="w-12 h-12 object-cover rounded">
                                    @else
                                    <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex justify-center space-x-2">
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
                                                    <h3 class="text-lg font-semibold text-gray-800">Edit Kategori</h3>
                                                    <button @click="openModal = false"
                                                        class="text-gray-500 hover:text-gray-700">&times;</button>
                                                </div>

                                                <!-- Body -->
                                                <form method="POST" action="{{ route( 'product.update','$product->slug') }}"
                                                    enctype="multipart/form-data" class="space-y-3">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Pilih Kategori -->
                                                    <div class="mb-4 text-left">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700">Kategori</label>
                                                        <select name="category_id" required
                                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                                            <option value="">-- Pilih Kategori --</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" @if($category->id ==
                                                                $product->category_id) selected @endif>
                                                                {{ $category->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Nama Produk -->
                                                    <div class="mb-4 text-left">
                                                        <label class="block text-sm font-medium text-gray-700">Nama
                                                            Produk</label>
                                                        <input type="text" name="name"
                                                            value="{{ old('name', $product->name) }}" required
                                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                                    </div>

                                                    <!-- Deskripsi -->
                                                    <div class="mb-4 text-left">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                                        <textarea name="description" rows="3"
                                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">{{ old('description', $product->description) }}</textarea>
                                                    </div>

                                                    <!-- Harga -->
                                                    <div class="mb-4 text-left">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700">Harga</label>
                                                        <input type="number" name="price"
                                                            value="{{ old('price', (int)$product->price) }}" min="0"
                                                            required
                                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                                    </div>

                                                    <!-- Stok -->
                                                    <div class="mb-4 text-left">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700">Stok</label>
                                                        <input type="number" name="stock"
                                                            value="{{ old('stock', $product->stock) }}" min="0" required
                                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                                    </div>

                                                    <!-- Gambar -->
                                                    <div class="mb-4 text-left">
                                                        <label class="block text-sm font-medium text-gray-700">Gambar
                                                            Produk</label>
                                                        <input type="file" name="image"
                                                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none">
                                                        @if($product->image)
                                                        <p class="mt-1 text-sm text-gray-500">Gambar saat ini: {{
                                                            $product->image }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="mt-4 flex justify-end space-x-2">
                                                        <button type="button" @click="openModal = false"
                                                            class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm">Batal</button>
                                                        <button type="submit"
                                                            class="px-4 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white text-sm">Simpan</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- Tombol Delete -->
                                    <form action="" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="px-6 py-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>