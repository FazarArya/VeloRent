<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Katalog') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.katalog.update', $katalog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="kategori_id" class="block text-sm font-medium text-gray-700">{{ __('Kategori') }}</label>
                            <select name="kategori_id" id="kategori_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $katalog->kategori_id == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">{{ __('Gambar') }}</label>
                            @if ($katalog->gambar)
                                <img src="{{ asset('storage/' . $katalog->gambar) }}" alt="Gambar" class="mb-2 w-32 h-32 object-cover rounded">
                            @endif
                            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="nama_kendaraan" class="block text-sm font-medium text-gray-700">{{ __('Nama Kendaraan') }}</label>
                            <input type="text" name="nama_kendaraan" id="nama_kendaraan" value="{{ $katalog->nama_kendaraan }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="jenis_kendaraan" class="block text-sm font-medium text-gray-700">{{ __('Jenis Kendaraan') }}</label>
                            <input type="text" name="jenis_kendaraan" id="jenis_kendaraan" value="{{ $katalog->jenis_kendaraan }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">{{ __('Deskripsi') }}</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $katalog->deskripsi }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="harga_sewa" class="block text-sm font-medium text-gray-700">{{ __('Harga Sewa') }}</label>
                            <input type="number" name="harga_sewa" id="harga_sewa" value="{{ $katalog->harga_sewa }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
