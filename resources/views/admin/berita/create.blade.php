@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="max-w-xl mx-auto bg-white p-4 sm:p-6 rounded-lg shadow-md">

    <h2 class="text-lg sm:text-xl font-semibold mb-4">
        Tambah Berita
    </h2>

    <form action="{{ route('admin.berita.store') }}"
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
                   class="w-full border p-2 rounded text-sm"
                   placeholder="Masukkan judul berita"
                   required>
        </div>

        <!-- ISI -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Isi Berita
            </label>

            <textarea name="isi"
                      rows="5"
                      class="w-full border p-2 rounded text-sm"
                      placeholder="Masukkan isi berita"
                      required></textarea>
        </div>

        <!-- GAMBAR -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Gambar
            </label>

            <input type="file"
                   name="gambar"
                   class="w-full border p-2 rounded text-sm">
        </div>

        <!-- BUTTON -->
        <div class="flex justify-between items-center mt-6">

            <a href="{{ route('admin.berita.index') }}"
               class="text-sm bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                ⬅ Kembali
            </a>

            <button type="submit"
                    class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                💾 Simpan
            </button>

        </div>

    </form>

</div>
@endsection