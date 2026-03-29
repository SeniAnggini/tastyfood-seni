@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

@php
$pesan = \App\Models\Contact::count();
$gallery = \App\Models\Gallery::count();
$berita = \App\Models\Berita::count();
$tentang = \App\Models\Tentang::count();

$total = $pesan + $gallery + $berita + $tentang;

$pesanPercent = $total ? ($pesan/$total)*100 : 0;
$galleryPercent = $total ? ($gallery/$total)*100 : 0;
$beritaPercent = $total ? ($berita/$total)*100 : 0;
$tentangPercent = $total ? ($tentang/$total)*100 : 0;
@endphp

<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
<!-- CARD -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-4 sm:p-6">    
    <div class="bg-blue-500 text-white p-4 sm:p-6 rounded-lg shadow-md">
        <h2 class="text-sm">Total Pesan</h2>
        <p class="text-3xl font-bold mt-2">{{ $pesan }}</p>
        <a href="{{ route('admin.kontak.index') }}" class="mt-4 inline-block bg-purple-500 hover:bg-purple-600 text-white text-sm px-4 py-2 rounded"> Kelola </a>
    </div>

    <div class="bg-green-500 text-white p-4 sm:p-6 rounded-lg shadow-md">
        <h2 class="text-sm">Total Gallery</h2>
        <p class="text-3xl font-bold mt-2">{{ $gallery }}</p>
        <a href="{{ route('admin.gallery.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-purple-600 text-white text-sm px-4 py-2 rounded"> Kelola </a>
    </div>

    <div class="bg-yellow-500 text-white p-4 sm:p-6 rounded-lg shadow-md">
        <h2 class="text-sm">Total Berita</h2>
        <p class="text-3xl font-bold mt-2">{{ $berita }}</p>
        <a href="{{ route('admin.berita.index') }}" class="mt-4 inline-block bg-green-500 hover:bg-purple-600 text-white text-sm px-4 py-2 rounded"> Kelola </a>
    </div>

    <div class="bg-purple-500 text-white p-4 sm:p-6 rounded-lg shadow-md">
        <h2 class="text-sm">Total Tentang</h2>
        <p class="text-3xl font-bold mt-2">{{ $tentang }}</p>
        <a href="{{ route('admin.tentang.index') }}" class="mt-4 inline-block bg-yellow-500 hover:bg-purple-600 text-white text-sm px-4 py-2 rounded"> Kelola </a>
    </div>

</div>


<!-- STATISTIK + DIAGRAM BATANG -->
<div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-4 sm:p-6">

<!-- DIAGRAM BULAT -->
<div class="bg-white p-4 sm:p-6 rounded-lg shadow-md flex flex-col items-center">

    <h2 class="text-lg font-semibold mb-6">Statistik Data</h2>

<div class="relative w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48">
        <div 
        id="donutChart"
        class="w-full h-full rounded-full scale-0 transition-transform duration-1000"
        style="background: conic-gradient(
        #3b82f6 0% {{ $pesanPercent }}%,
        #22c55e {{ $pesanPercent }}% {{ $pesanPercent+$galleryPercent }}%,
        #eab308 {{ $pesanPercent+$galleryPercent }}% {{ $pesanPercent+$galleryPercent+$beritaPercent }}%,
        #8b5cf6 {{ $pesanPercent+$galleryPercent+$beritaPercent }}% 100%
        );">
        </div>

        <div class="absolute inset-10 bg-white rounded-full flex flex-col items-center justify-center font-semibold">
            <span class="text-sm">Total</span>
            <span class="text-lg">{{ $total }}</span>
        </div>

    </div>

    <!-- PERSENTASE -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6 text-xs sm:text-sm">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
            Pesan ({{ round($pesanPercent) }}%)
        </div>

        <div class="flex items-center gap-2">
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
            Gallery ({{ round($galleryPercent) }}%)
        </div>

        <div class="flex items-center gap-2">
            <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
            Berita ({{ round($beritaPercent) }}%)
        </div>

        <div class="flex items-center gap-2">
            <span class="w-3 h-3 bg-purple-500 rounded-full"></span>
            Tentang ({{ round($tentangPercent) }}%)
        </div>

    </div>

</div>


<!-- DIAGRAM BATANG -->
<div class="bg-white p-4 sm:p-6 rounded-lg shadow-md">

    <h2 class="text-lg font-semibold mb-6 text-center">Diagram Batang</h2>

    <div class="space-y-3 sm:space-y-4">

        <div>
<p class="text-xs sm:text-sm mb-1">Pesan</p>
            <div class="w-full bg-gray-200 rounded h-4">
                <div class="bg-blue-500 h-4 rounded bar" data-width="{{ $pesanPercent }}"></div>
            </div>
        </div>

        <div>
            <p class="text-sm mb-1">Gallery</p>
            <div class="w-full bg-gray-200 rounded h-4">
                <div class="bg-green-500 h-4 rounded bar" data-width="{{ $galleryPercent }}"></div>
            </div>
        </div>

        <div>
            <p class="text-sm mb-1">Berita</p>
            <div class="w-full bg-gray-200 rounded h-4">
                <div class="bg-yellow-500 h-4 rounded bar" data-width="{{ $beritaPercent }}"></div>
            </div>
        </div>

        <div>
            <p class="text-sm mb-1">Tentang</p>
            <div class="w-full bg-gray-200 rounded h-4">
                <div class="bg-purple-500 h-4 rounded bar" data-width="{{ $tentangPercent }}"></div>
            </div>
            
        </div>

    </div>

</div>

</div>


<!-- LINE CHART -->
<div class="mt-10 bg-white p-4 sm:p-6 rounded-lg shadow-md">

    <h2 class="text-lg font-semibold mb-6 text-center">Grafik Line Statistik</h2>

<div class="w-full overflow-x-auto">
    <canvas id="lineChart" class="min-w-[300px]"></canvas>
</div>
</div>

</div>


<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('lineChart');

new Chart(ctx, {
type: 'line',
data: {
labels: ['Pesan','Gallery','Berita','Tentang'],
datasets: [{
label: 'Jumlah Data',
data: [{{ $pesan }}, {{ $gallery }}, {{ $berita }}, {{ $tentang }}],
borderColor: '#3b82f6',
backgroundColor: 'rgba(59,130,246,0.2)',
tension: 0.4,
fill: true
}]
},
options: {
responsive: true,
animation:{
duration:1500,
easing:'easeOutQuart'
},
plugins:{
legend:{
display:true
}
}
}
});


// animasi saat load
window.onload = function(){

// donut animasi
document.getElementById("donutChart").classList.remove("scale-0");

// bar animasi
document.querySelectorAll(".bar").forEach(function(bar){

let width = bar.getAttribute("data-width");

bar.style.width = "0%";

setTimeout(function(){
bar.style.transition = "width 1s ease";
bar.style.width = width + "%";
},200);

});

}

</script>

@endsection