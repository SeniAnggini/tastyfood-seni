@extends('admin.layouts.app')

@section('title', 'Pesan Kontak')

@section('content')
<div>

    <h1 class="text-xl sm:text-2xl font-bold mb-4">Pesan Masuk</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

        @forelse($contacts as $item)
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 p-4 flex flex-col">

            <!-- HEADER -->
            <div class="mb-2">
                <h4 class="font-semibold text-base sm:text-lg">
                    {{ $item->nama }}
                </h4>
                <p class="text-xs sm:text-sm text-gray-500">
                    {{ $item->email }}
                </p>
            </div>

            <!-- PESAN -->
            <div class="text-sm text-gray-700">
                {{ \Illuminate\Support\Str::limit($item->pesan, 120) }}
            </div>

            <!-- AKSI -->
            <div class="mt-auto pt-4">
                <form method="POST" action="{{ route('admin.kontak.destroy', $item->id) }}">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        onclick="return confirm('Hapus pesan ini?')"
                        class="w-full bg-red-500 hover:bg-red-600 text-white text-xs sm:text-sm px-3 py-2 rounded"
                    >
                        🗑️ Hapus
                    </button>
                </form>
            </div>

        </div>

        @empty
        <div class="col-span-full text-center text-gray-500 py-10">
            Belum ada pesan masuk
        </div>
        @endforelse

    </div>

</div>
@endsection