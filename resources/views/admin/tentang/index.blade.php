@extends('admin.layouts.app')

@section('title', 'Data Tentang')

@section('content')
<div>

    <h2 class="text-xl sm:text-2xl font-semibold mb-4">Data Tentang</h2>

    <a href="{{ route('admin.tentang.create') }}"
       class="inline-block mb-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm">
        + Tambah Data
    </a>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

        @forelse ($tentangs as $tentang)
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 overflow-hidden flex flex-col">

            <!-- GAMBAR -->
            @if ($tentang->gambar)
                <img src="{{ asset('storage/' . $tentang->gambar) }}"
                     class="w-full h-40 sm:h-48 object-cover">
            @else
                <div class="w-full h-40 sm:h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
                    Tidak ada gambar
                </div>
            @endif

            <!-- CONTENT -->
            <div class="p-4 flex flex-col flex-1">

                <div>
                    <h4 class="font-semibold text-base sm:text-lg mb-2">
                        {{ $tentang->section }}
                    </h4>

                    <p class="text-xs sm:text-sm text-gray-600">
                        {{ \Illuminate\Support\Str::limit($tentang->deskripsi, 100) }}
                    </p>
                </div>

                <!-- AKSI -->
                <div class="mt-auto pt-4 flex gap-2">

                    <a href="{{ route('admin.tentang.edit', $tentang->id) }}"
                       class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 text-white text-xs sm:text-sm px-3 py-2 rounded">
                        ✏️ Edit
                    </a>

                    <form action="{{ route('admin.tentang.destroy', $tentang->id) }}"
                          method="POST"
                          class="flex-1"
                          onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="w-full bg-red-500 hover:bg-red-600 text-white text-xs sm:text-sm px-3 py-2 rounded">
                            🗑️ Hapus
                        </button>
                    </form>

                </div>

            </div>

        </div>

        @empty
        <div class="col-span-full text-center text-gray-500 py-10">
            Data belum tersedia
        </div>
        @endforelse

    </div>

</div>
@endsection