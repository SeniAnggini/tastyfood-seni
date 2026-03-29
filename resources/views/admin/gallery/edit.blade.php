@extends('admin.layouts.app')

@section('title', 'Edit Gallery')

@section('content')
<div class="max-w-xl mx-auto bg-white p-4 sm:p-6 rounded-lg shadow-md">

    <h2 class="text-lg sm:text-xl font-semibold mb-4">
        ✏️ Edit Gallery
    </h2>

    <form action="{{ route('admin.gallery.update', $gallery->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- JUDUL -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Judul
            </label>

            <input type="text"
                   name="judul"
                   value="{{ $gallery->judul }}"
                   class="w-full border p-2 rounded text-sm"
                   required>
        </div>

        <!-- GAMBAR SEKARANG -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Gambar Saat Ini
            </label>

            <img src="{{ asset('storage/'.$gallery->gambar) }}"
                 class="w-32 h-32 object-cover rounded border">
        </div>

        <!-- GANTI GAMBAR -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Ganti Gambar (Opsional)
            </label>

            <input type="file"
                   name="gambar"
                   class="w-full border p-2 rounded text-sm">
        </div>

        <!-- DESKRIPSI -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Deskripsi
            </label>

            <textarea name="description"
                      rows="4"
                      class="w-full border p-2 rounded text-sm"
                      required>{{ $gallery->description }}</textarea>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-between items-center mt-6">

            <a href="{{ route('admin.gallery.index') }}"
               class="text-sm bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                ⬅ Kembali
            </a>

            <button type="submit"
                    class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                💾 Update
            </button>

        </div>

    </form>

</div>
@endsection