<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Artikel') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white shadow-sm rounded-lg p-4">
                <a href="{{ route('admin.artikel.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-3 inline-block">Tambah
                    Artikel</a>
                @if (session('success'))
                    <div class="alert alert-success text-green-600 mb-4">{{ session('success') }}</div>
                @endif

                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4 text-left">No</th>
                            <th class="py-2 px-4 text-left">Judul</th>
                            <th class="py-2 px-4 text-left">Penulis</th>
                            <th class="py-2 px-4 text-left">Gambar</th>
                            <th class="py-2 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikels as $artikel)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4">
                                    <div>{{ $artikel->judul }}</div>
                                    <div class="text-sm text-gray-500">{{ $artikel->deskripsi }}</div>
                                </td>
                                <td class="py-2 px-4">{{ $artikel->user->name }}</td>
                                <td class="py-2 px-4">
                                    @if ($artikel->image)
                                        <img src="{{ asset('storage/' . $artikel->image) }}" alt="{{ $artikel->judul }}"
                                            class="w-16 h-16 object-cover">
                                    @endif
                                </td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('admin.artikel.edit', $artikel) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Kembali ke Halaman Utama -->
                <div class="mt-4">
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:underline">
                        {{ __('Kembali ke Dashboard') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>