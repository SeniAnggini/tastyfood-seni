@extends('admin.layouts.app')

@section('title', 'Edit Tentang')

@section('content')
<div class="max-w-xl mx-auto bg-white p-4 sm:p-6 rounded-lg shadow-md">

    <h2 class="text-lg sm:text-xl font-semibold mb-4">
        Edit Data Tentang
    </h2>

    <form action="{{ route('admin.tentang.update', $tentang->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- SECTION -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Section
            </label>

            <select name="section"
                    class="w-full border p-2 rounded text-sm"
                    required>
                <option value="tasty_food" {{ $tentang->section == 'tasty_food' ? 'selected' : '' }}>Tasty Food</option>
                <option value="visi" {{ $tentang->section == 'visi' ? 'selected' : '' }}>Visi</option>
                <option value="misi" {{ $tentang->section == 'misi' ? 'selected' : '' }}>Misi</option>
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
                      required>{{ $tentang->deskripsi }}</textarea>
        </div>

        <!-- GAMBAR -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Gambar
            </label>

            @if ($tentang->gambar)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $tentang->gambar) }}"
                         class="w-24 h-24 object-cover rounded border">
                </div>
            @endif

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
                    class="text-sm bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                💾 Update
            </button>

        </div>

    </form>

</div>
@endsection