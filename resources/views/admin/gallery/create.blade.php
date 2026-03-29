@extends('admin.layouts.app')

@section('title', 'Tambah Gallery')

@section('content')
<div class="max-w-xl mx-auto bg-white p-4 sm:p-6 rounded-lg shadow-md">

    <h2 class="text-lg sm:text-xl font-semibold mb-4">
        Tambah Gallery
    </h2>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.gallery.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <!-- JUDUL -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Judul
            </label>

            <input type="text"
                   name="judul"
                   value="{{ old('judul') }}"
                   class="w-full border p-2 rounded text-sm"
                   required>
        </div>

        <!-- GAMBAR -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Gambar
            </label>

            <input type="file"
                   name="gambar"
                   class="w-full border p-2 rounded text-sm"
                   required>
        </div>

        <!-- DESKRIPSI -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Deskripsi
            </label>

            <textarea name="description"
                      rows="4"
                      class="w-full border p-2 rounded text-sm"
                      required>{{ old('description') }}</textarea>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-between items-center mt-6">

            <a href="{{ route('admin.gallery.index') }}"
               class="text-sm bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                ⬅ Kembali
            </a>

            <button type="submit"
                    class="text-sm bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                💾 Simpan
            </button>

        </div>

    </form>

</div>
@endsection