<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4">
                    <h2 class="text-xl font-bold text-white text-center">Form Penyewaan Kendaraan</h2>
                    <p class="mt-1 text-sm text-indigo-100 text-center">Silahkan isi form dibawah ini dengan benar</p>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-3 bg-green-50 border border-green-200 text-green-600 px-4 py-2 rounded-md">
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('pesan') }}">
                        @csrf

                        <!-- Informasi Personal -->
                        <div class="mb-6">
                            <h3 class="text-md font-semibold text-gray-900 pb-1 border-b mb-3">Informasi Personal</h3>

                            <!-- Username -->
                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Username
                                </label>
                                <input type="text" value="{{ auth()->user()->name }}"
                                    class="block w-full px-3 py-2 text-sm rounded-md bg-gray-50 border border-gray-200" readonly>
                            </div>

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nama Lengkap
                                </label>
                                <input type="text" name="nama" id="nama"
                                    class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                    Email
                                </label>
                                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                                    class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                    required>
                            </div>

                            <!-- No HP -->
                            <div class="mb-3">
                                <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">
                                    No. Handphone
                                </label>
                                <input type="text" name="no_hp" id="no_hp"
                                    class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                    placeholder="Contoh: 08123456789" required>
                            </div>
                        </div>

                        <!-- Informasi Kendaraan -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kendaraan</h3>

                            <div class="grid grid-cols-1 gap-6">
                                <!-- Jenis Kendaraan -->
                                <div class="mb-3">
                                    <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">
                                        Jenis Kendaraan
                                    </label>
                                    <select id="kategori_id"
                                        class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                        required>
                                        <option value="">Pilih Jenis Kendaraan</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Pilihan Kendaraan -->
                                <div class="mb-3">
                                    <label for="katalog_id" class="block text-sm font-medium text-gray-700 mb-1">
                                        Pilihan Kendaraan
                                    </label>
                                    <select id="katalog_id" name="katalog_id"
                                        class="block w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                        required disabled>
                                        <option value="">Pilih Kendaraan</option>
                                    </select>
                                </div>

                                <!-- Info Harga -->
                                <div id="hargaInfo" class="hidden p-4 bg-gray-50 rounded-md mt-3">
                                    <p class="text-sm text-gray-600">Harga Sewa: <span id="hargaSewa" class="font-medium"></span> / hari</p>
                                </div>
                            </div>
                        </div>



                        <!-- Tombol Submit -->
                        <div>
                            <button type="submit"
                                class="w-full bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                                Pesan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('kategori_id').addEventListener('change', function() {
            const kategoriId = this.value;
            console.log('Selected kategori_id:', kategoriId);
            console.log('Type of kategori_id:', typeof kategoriId);
            const kendaraanSelect = document.getElementById('katalog_id');
            const hargaInfo = document.getElementById('hargaInfo');

            // Debug
            console.log('Selected kategori_id:', kategoriId);

            // Reset dan disable select kendaraan
            kendaraanSelect.disabled = true;
            kendaraanSelect.innerHTML = '<option value="">Pilih Kendaraan</option>';
            if (hargaInfo) hargaInfo.classList.add('hidden');

            if (kategoriId) {
                // Tampilkan loading
                kendaraanSelect.innerHTML = '<option value="">Loading...</option>';

                // Buat URL dengan route() helper
                const url = "{{ route('pesan.get-kendaraan') }}?kategori_id=" + kategoriId;
                console.log('Fetching URL:', url);

                fetch(url, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        console.log('Response status:', response.status);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Data received:', data);
                        kendaraanSelect.innerHTML = '<option value="">Pilih Kendaraan</option>';

                        if (data && data.length > 0) {
                            data.forEach(item => {
                                const option = new Option(item.nama_kendaraan, item.id);
                                option.dataset.harga = item.harga_sewa;
                                kendaraanSelect.add(option);
                            });
                            kendaraanSelect.disabled = false;
                        } else {
                            kendaraanSelect.innerHTML = '<option value="">Tidak ada data kendaraan</option>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        kendaraanSelect.innerHTML = '<option value="">Error loading data</option>';
                    });
            }
        });

        // Tambahkan event listener untuk perubahan pilihan kendaraan
        document.getElementById('katalog_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const hargaInfo = document.getElementById('hargaInfo');
            const hargaSewa = document.getElementById('hargaSewa');

            if (this.value && selectedOption.dataset.harga) {
                const harga = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(selectedOption.dataset.harga);

                hargaSewa.textContent = harga;
                hargaInfo.classList.remove('hidden');
            } else {
                hargaInfo.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
