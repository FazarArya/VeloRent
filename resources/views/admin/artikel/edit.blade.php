<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Artikel') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white shadow-sm rounded-lg p-4">
                <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <!-- Judul -->
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="judul" id="judul"
                                value="{{ old('judul', $artikel->judul) }}"
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md" required>
                            @error('judul')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md"
                                required>{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="image" id="image"
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md">
                            @if ($artikel->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $artikel->image) }}" alt="{{ $artikel->judul }}"
                                        class="w-32 h-32 object-cover">
                                </div>
                            @endif
                            @error('image')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="text-right">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
                        </div>
                    </div>
                </form>

                <!-- Kembali ke Daftar Artikel -->
                <div class="mt-4">
                    <a href="{{ route('admin.artikel') }}" class="text-sm text-gray-600 hover:underline">Kembali ke
                        Daftar Artikel</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
