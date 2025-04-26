<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Katalog') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.katalog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="kategori_id" class="block text-sm font-medium text-gray-700">{{ __('Kategori') }}</label>
                            <select name="kategori_id" id="kategori_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="" disabled selected>{{ __('Pilih Kategori') }}</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">{{ __('Gambar') }}</label>
                            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="nama_kendaraan" class="block text-sm font-medium text-gray-700">{{ __('Nama Kendaraan') }}</label>
                            <input type="text" name="nama_kendaraan" id="nama_kendaraan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: Honda Jazz" required>
                        </div>

                        <div class="mb-4">
                            <label for="jenis_kendaraan" class="block text-sm font-medium text-gray-700">{{ __('Jenis Kendaraan') }}</label>
                            <input type="text" name="jenis_kendaraan" id="jenis_kendaraan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: Harian" required>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">{{ __('Deskripsi') }}</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Masukkan deskripsi kendaraan"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="harga_sewa" class="block text-sm font-medium text-gray-700">{{ __('Harga Sewa') }}</label>
                            <input type="number" name="harga_sewa" id="harga_sewa" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: 150000" required>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Simpan') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
