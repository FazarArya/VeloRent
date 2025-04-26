<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Filter Kategori -->
                    <div class="mb-4 flex space-x-2">
                        <button onclick="window.location='{{ route('katalog.user') }}'" 
                                class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            {{ __('All') }}
                        </button>
                        <button onclick="window.location='{{ route('katalog.user', ['kategori' => 'Mobil']) }}'" 
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            {{ __('Mobil') }}
                        </button>
                        <button onclick="window.location='{{ route('katalog.user', ['kategori' => 'Motor']) }}'" 
                                class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                            {{ __('Motor') }}
                        </button>
                    </div>

                    <!-- List Katalog -->
                    @forelse ($katalogs as $katalog)
                        <div class="border border-gray-300 rounded-lg overflow-hidden flex mb-4">
                            <!-- Gambar Kendaraan -->
                            <img src="{{ asset('storage/' . $katalog->gambar) }}" alt="{{ $katalog->nama_kendaraan }}" 
                                class="w-48 h-32 object-cover rounded-l-lg">

                            <!-- Detail Kendaraan -->
                            <div class="p-4 flex-1">
                                <!-- Nama Kendaraan -->
                                <h3 class="text-lg font-semibold">{{ $katalog->nama_kendaraan }}</h3>
                                <!-- Kategori Kendaraan -->
                                <p class="text-sm text-gray-600">{{ $katalog->kategori->nama }}</p>
                                <!-- Deskripsi -->
                                <p class="text-sm mt-2 text-gray-700">{{ Str::limit($katalog->deskripsi, 100) }}</p>
                                <!-- Harga Sewa -->
                                <p class="text-lg font-bold mt-2 text-gray-900">Rp{{ number_format($katalog->harga_sewa, 0, ',', '.') }}</p>
                            </div>

                            <!-- Tombol Sewa -->
                            <div class="p-4 flex items-center">
                                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    {{ __('Sewa') }}
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">{{ __('Tidak ada katalog kendaraan yang tersedia.') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
