@extends('admin.layouts.app')

@section('content')
<div>

    <h3 class="text-xl sm:text-2xl font-semibold mb-4">📰 Data Berita</h3>

    <div class="mb-4">
        <a href="{{ route('admin.berita.create') }}"
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm sm:text-base">
            ➕ Tambah Berita
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

        @forelse ($beritas as $berita)
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 overflow-hidden flex flex-col">

            <!-- GAMBAR -->
            @if ($berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}"
                     class="w-full h-40 sm:h-48 object-cover">
            @else
                <div class="w-full h-40 sm:h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
                    Tidak ada gambar
                </div>
            @endif

            <!-- CONTENT -->
            <div class="p-4 flex flex-col flex-1">

                <!-- TEXT -->
                <div>
                    <h4 class="font-semibold text-base sm:text-lg mb-2 line-clamp-2">
                        {{ $berita->judul }}
                    </h4>

                    <p class="text-xs sm:text-sm text-gray-600">
                        {{ \Illuminate\Support\Str::limit($berita->isi, 100) }}
                    </p>
                </div>

                <!-- AKSI -->
                <div class="mt-auto pt-4 flex gap-2">

                    <a href="{{ route('admin.berita.edit', $berita->id) }}"
                       class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 text-white text-xs sm:text-sm px-3 py-2 rounded">
                        ✏️ Edit
                    </a>

                    <form action="{{ route('admin.berita.destroy', $berita->id) }}"
                          method="POST"
                          class="flex-1">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Hapus data ini?')"
                                class="w-full bg-red-500 hover:bg-red-600 text-white text-xs sm:text-sm px-3 py-2 rounded">
                            🗑️ Hapus
                        </button>
                    </form>

                </div>

            </div>

        </div>

        @empty
        <div class="col-span-full text-center text-gray-500 py-10">
            Belum ada data berita
        </div>
        @endforelse

    </div>

</div>
@endsection