<x-layouts.app title="Profile">
    <div class="bg-white rounded-xl shadow p-6">
        <!-- Header -->
        <div class="flex items-center space-x-4 border-b pb-4 mb-4">
           <img src="{{ $profile && $profile->image 
            ? asset('storage/' . $profile->image) 
            : 'https://i.pravatar.cc/100?u=' . auth()->user()->id }}" alt="Profile" class="w-16 h-16 rounded-full">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">{{ auth()->user()->name ?? 'Belum diisi' }}</h2>
                <p class="text-gray-500 text-sm">Kelola informasi akunmu di sini</p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex space-x-6 mb-2 text-sm font-medium">
            <a href="#" class="pb-2 border-b font-bold text-base text-green-600">Biodata Diri</a>
            <a href="#" class="pb-2 font-bold text-base text-gray-500">Alamat</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-5 border-t border-b">
            <!-- Foto Profil -->
            <div class="col-span-1 flex flex-col items-center justify-center">
                <img src="{{ $profile && $profile->image 
            ? asset('storage/' . $profile->image) 
            : 'https://i.pravatar.cc/100?u=' . auth()->user()->id }}" alt="Profile" class="w-48 h-72 rounded-lg object-cover object-center">
            </div>

            <!-- Biodata -->
            <div class="col-span-2 flex flex-col justify-between">
                <div>
                    <h1 class="text-gray-500 font-semibold mb-3 pb-3">Ubah Biodata Diri</h1>
                    <div class="space-y-6 text-sm">
                        <div class="flex justify-between">
                            <span class="font-normal text-gray-800">Nama</span>
                            <span class="text-gray-800">{{ auth()->user()->profile->name ?? 'Nama Belum Di isi'
                                }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-normal text-gray-800">Tanggal Lahir</span>
                            <span class="text-gray-800">
                               {{ auth()->user()->profile->date_of_birth ?? 'Tanggal Lahir Belum Di isi'
                                }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-normal text-gray-800">Jenis Kelamin</span>
                            <span class="text-gray-800">{{ auth()->user()->profile->gender ?? 'Jenis Kelamin Belum Di
                                isi' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-normal text-gray-800">Alamat</span>
                            <span class="text-gray-800">{{ auth()->user()->profile->address ?? 'Alamat Belum Di
                                isi' }}</span>
                        </div>
                    </div>

                    <h1 class="text-gray-500 font-semibold mb-3 pt-6 pb-5">Ubah Kontak</h1>
                    <div class="space-y-6 text-sm">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Email</span>
                            <span class="text-gray-800">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nomor HP</span>
                            <span class="text-gray-800">{{ auth()->user()->profile->phone_number ?? 'Nomor Handphone
                                Belum Di
                                isi' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Button Edit Profile -->
                <div class="mt-6 flex justify-end">
                    <flux:modal.trigger name="edit-profile">
                        <flux:button>Edit profile</flux:button>
                    </flux:modal.trigger>

                    <flux:modal name="edit-profile" class="md:w-96">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="space-y-6">
                                <div>
                                    <flux:heading size="lg">Update profile</flux:heading>
                                    <flux:text class="mt-2">Make changes to your personal details.</flux:text>
                                </div>

                                <flux:input label="Name" name="name" placeholder="Your name"
                                    value="{{ old('name', $profile->name) }}" />

                                <flux:input label="Date of birth" type="date" name="date_of_birth"
                                    value="{{ old('date_of_birth', $profile->date_of_birth) }}" />

                                <flux:select label="Jenis Kelamin" name="gender">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" @if(old('gender', $profile->gender)=='L') selected
                                        @endif>Laki-laki</option>
                                    <option value="P" @if(old('gender', $profile->gender)=='P') selected
                                        @endif>Perempuan</option>
                                </flux:select>

                                <flux:input label="Address" name="address" placeholder="Your address"
                                    value="{{ old('address', $profile->address) }}" />

                                <flux:input label="Phone number" name="phone_number" placeholder="Your phone number"
                                    value="{{ old('phone_number', $profile->phone_number) }}" />

                                <flux:input label="Profile image" type="file" name="image" />

                                <div class="flex">
                                    <flux:spacer />
                                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                                </div>
                            </div>
                        </form>
                    </flux:modal>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>