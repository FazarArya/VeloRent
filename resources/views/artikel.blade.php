<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl font-bold mb-4">Daftar Artikel</h1>
                    <ul>
                        @foreach ($artikels as $artikel)
                            <li class="mb-6 flex items-start">
                                @if ($artikel->image)
                                    <img src="{{ asset('storage/' . $artikel->image) }}" alt="{{ $artikel->judul }}"
                                        class="w-20 h-20 object-cover rounded-md mr-4">
                                @endif
                                <div>
                                    <a href="{{ route('artikel-show', $artikel->id) }}"
                                        class="text-blue-500 hover:underline">
                                        {{ $artikel->judul }}
                                    </a>
                                    <p class="text-gray-500 text-sm">Penulis: {{ $artikel->user->name }}</p>
                                    <p>{{ \Illuminate\Support\Str::limit($artikel->deskripsi, 100, '...') }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
