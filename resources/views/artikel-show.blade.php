<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold">{{ $artikel->judul }}</h1>
                    <p class="text-gray-500 text-sm">
                        Penulis: {{ $artikel->user->name }} |
                        <span>Dibuat pada: {{ $artikel->created_at->format('d M Y, H:i') }}</span>
                    </p>
                    @if ($artikel->image)
                        <img src="{{ asset('storage/' . $artikel->image) }}" alt="{{ $artikel->judul }}"
                            class="mt-4 w-full h-64 object-cover">
                    @endif
                    <p class="mt-4">{{ $artikel->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
