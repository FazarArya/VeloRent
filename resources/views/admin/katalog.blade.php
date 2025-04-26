<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Katalog') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4 text-right">
                        <a href="{{ route('admin.katalog.create') }}" class="px-4 py-2 rounded-md bg-blue-500 text-white text-sm hover:bg-blue-600">
                            {{ __('Tambah Katalog') }}
                        </a>
                    </div>

                    @if ($katalogs->count())
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm border border-gray-300 rounded-md">
                                <thead class="bg-gray-100 text-gray-700">
                                    <tr>
                                        <th class="px-4 py-2 border-b">No</th>
                                        <th class="px-4 py-2 border-b">Gambar</th>
                                        <th class="px-4 py-2 border-b">Kategori</th>
                                        <th class="px-4 py-2 border-b">Nama Kendaraan</th>
                                        <th class="px-4 py-2 border-b">Harga Sewa</th>
                                        <th class="px-4 py-2 border-b">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($katalogs as $katalog)
                                        <tr>
                                            <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2 border-b"><img src="{{ asset('storage/' . $katalog->gambar) }}" width="50"></td>
                                            <td class="px-4 py-2 border-b">{{ $katalog->kategori->nama }}</td>
                                            <td class="px-4 py-2 border-b">{{ $katalog->nama_kendaraan }}</td>
                                            <td class="px-4 py-2 border-b">Rp{{ number_format($katalog->harga_sewa, 0, ',', '.') }}</td>
                                            <td class="px-4 py-2 border-b">
                                                <a href="{{ route('admin.katalog.edit', $katalog->id) }}" class="text-blue-500">Edit</a>
                                                <form action="{{ route('admin.katalog.destroy', $katalog->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Tidak ada katalog.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
