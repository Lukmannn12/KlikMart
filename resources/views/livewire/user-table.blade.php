<div>
    <div class="mx-auto" x-data="{ loading: true, loadingTable: true, openModal: false }"
        x-init="setTimeout(() => { loading = false; loadingTable = false }, 1500)">

        <!-- Judul -->
        <h1
            class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
            Dashboard <span class="text-gray-400">→</span> User <span class="text-gray-400">→</span>
            Data User
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
                            <input type="text" wire:model.live="search" placeholder="Cari Nama User..."
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
                                <th class="p-4">Nama</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-center text-sm">
                            @if($users->isEmpty())
                            <tr>
                                <td colspan="3" class="py-6 text-gray-500">Tidak ada data</td>
                            </tr>
                            @else
                            @foreach ($users as $user)
                            <tr>
                                <td class="p-4">
                                    {{ $users->firstItem() + $loop->index }}
                                </td>
                                <td class="p-4">{{ $user->name }}</td>
                                <td class="p-4">{{ $user->email }}</td>
                                <td class="p-4">
                                    <span class="px-2 py-1 rounded-full text-white text-xs
                                        {{ $user->role === 'admin' ? 'bg-green-500' : 'bg-blue-500' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="px-6 py-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>