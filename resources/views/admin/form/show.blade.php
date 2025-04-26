<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Pesanan #{{ $pesanan->id }}
            </h2>
            <a href="{{ route('admin.form') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pesanan</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600">ID Pesanan</p>
                                <p class="text-gray-900">{{ $pesanan->id }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Status</p>
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $pesanan->status === 'approved'
                                        ? 'bg-green-100 text-green-800'
                                        : ($pesanan->status === 'rejected'
                                            ? 'bg-red-100 text-red-800'
                                            : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($pesanan->status) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Tanggal Pesanan</p>
                                <p class="text-gray-900">{{ $pesanan->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Terakhir Update</p>
                                <p class="text-gray-900">{{ $pesanan->updated_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pelanggan</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Nama</p>
                                <p class="text-gray-900">{{ $pesanan->nama }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Email</p>
                                <p class="text-gray-900">{{ $pesanan->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">No HP</p>
                                <p class="text-gray-900">{{ $pesanan->no_hp }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kendaraan</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Jenis Kendaraan</p>
                                <p class="text-gray-900">{{ $pesanan->katalog->kategori->nama ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Pilihan Kendaraan</p>
                                <p class="text-gray-900">{{ $pesanan->katalog->nama_kendaraan ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Harga Sewa</p>
                                <p class="text-gray-900">Rp {{ number_format($pesanan->katalog->harga_sewa ?? 0, 0, ',', '.') }} / hari</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('admin.form.edit', $pesanan->id) }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Edit
                        </a>
                        <a href="{{ route('admin.form.pdf', $pesanan->id) }}"
                            class="px-4 py-2 bg-yellow-600 text-white rounded-md text-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                            Export PDF
                        </a>
                        <form action="{{ route('admin.form.destroy', $pesanan->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md text-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
