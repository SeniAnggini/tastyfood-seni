@extends('admin.layouts.app')

@section('title', 'Tambah Tentang')

@section('content')
<div class="max-w-xl mx-auto bg-white p-4 sm:p-6 rounded-lg shadow-md">

    <h2 class="text-lg sm:text-xl font-semibold mb-4">
        Tambah Data Tentang
    </h2>

    <form action="{{ route('admin.tentang.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <!-- SECTION -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Section
            </label>

            <select name="section"
                    class="w-full border p-2 rounded text-sm"
                    required>
                <option value="">-- Pilih Section --</option>
                <option value="tasty_food">Tasty Food</option>
                <option value="visi">Visi</option>
                <option value="misi">Misi</option>
            </select>
        </div>

        <!-- DESKRIPSI -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      rows="5"
                      class="w-full border p-2 rounded text-sm"
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

            <a href="{{ route('admin.tentang.index') }}"
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