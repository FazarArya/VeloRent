<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Pesanan') }}
            </h2>
            <a href="{{ route('pesan') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                Kembali
            </a>
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
                                    class="px-2 py-1 text-xs font-semibold rounded-full inline-block mt-1
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
                                <p class="text-gray-900">{{ ucfirst($pesanan->katalog->jenis_kendaraan) }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Pilihan Kendaraan</p>
                                <p class="text-gray-900">{{ ucfirst(str_replace('_', ' ', $pesanan->katalog->nama_kendaraan)) }}</p>
                            </div>
                        </div>
                    </div>

                    @if ($pesanan->status === 'pending')
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        Pesanan Anda sedang dalam proses review. Kami akan menghubungi Anda segera.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif($pesanan->status === 'approved')
                        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-700">
                                        Pesanan Anda telah disetujui. Silakan lakukan pembayaran sesuai instruksi yang akan kami kirim melalui email.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif($pesanan->status === 'rejected')
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700">
                                        Mohon maaf, pesanan Anda tidak dapat kami proses saat ini. Silakan hubungi kami untuk informasi lebih lanjut.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
