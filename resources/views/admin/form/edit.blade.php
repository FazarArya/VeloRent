<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Pesanan #{{ $pesanan->id }}
            </h2>
            <a href="{{ route('admin.form') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.form.update', $pesanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pelanggan</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-3">
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                    <input type="text" name="nama" id="nama" value="{{ old('nama', $pesanan->nama) }}"
                                        class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $pesanan->email) }}"
                                        class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">No HP</label>
                                    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $pesanan->no_hp) }}"
                                        class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kendaraan</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-3">
                                    <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">
                                        Jenis Kendaraan
                                    </label>
                                    <select id="kategori_id"
                                        class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                        required>
                                        <option value="">Pilih Jenis Kendaraan</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                {{ $pesanan->katalog->kategori_id == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="katalog_id" class="block text-sm font-medium text-gray-700 mb-1">
                                        Pilihan Kendaraan
                                    </label>
                                    <select name="katalog_id" id="katalog_id"
                                        class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                        required>
                                        <option value="">Pilih Kendaraan</option>
                                        @foreach ($katalogs as $katalog)
                                            <option value="{{ $katalog->id }}" data-kategori="{{ $katalog->kategori_id }}"
                                                {{ $pesanan->katalog_id == $katalog->id ? 'selected' : '' }}>
                                                {{ $katalog->nama_kendaraan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select name="status" id="status"
                                        class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                        required>
                                        <option value="pending" {{ $pesanan->status === 'pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                        <option value="approved" {{ $pesanan->status === 'approved' ? 'selected' : '' }}>
                                            Approved
                                        </option>
                                        <option value="rejected" {{ $pesanan->status === 'rejected' ? 'selected' : '' }}>
                                            Rejected
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Update Pesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kategoriSelect = document.getElementById('kategori_id');
            const kendaraanSelect = document.getElementById('katalog_id');

            function filterKendaraan() {
                const kategoriId = kategoriSelect.value;
                const options = kendaraanSelect.querySelectorAll('option');

                options.forEach(option => {
                    if (option.value === '') return;
                    if (option.dataset.kategori === kategoriId) {
                        option.style.display = '';
                    } else {
                        option.style.display = 'none';
                    }
                });
            }

            kategoriSelect.addEventListener('change', filterKendaraan);
            filterKendaraan();
        });
    </script>
</x-app-layout>
