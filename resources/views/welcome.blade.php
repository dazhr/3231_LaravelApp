@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
    <div class="flex-1 space-y-8">
        <span
            class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
            #1 Event Platform
        </span>

        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
            Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
        </h1>

        <p class="text-lg text-slate-500 max-w-lg leading-relaxed">
            Dari konser musik hingga workshop teknologi, semua ada di genggamanmu.
        </p>
    </div>
</section>

<!-- Filter Kategori -->
<div class="mb-8 flex gap-4 justify-center">
    
    <a href="/"
        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded text-black transition">
        Semua Kategori
    </a>

    @foreach($categories as $cat)
        <a href="/?category={{ $cat->slug }}"
            class="px-4 py-2 bg-indigo-100 hover:bg-indigo-200 text-indigo-700 rounded shadow-sm transition">

            {{ $cat->name }}

        </a>
    @endforeach

</div>

<!-- Events Section -->
<section id="events" class="max-w-7xl mx-auto px-6 py-20">

    <div class="flex justify-between items-end mb-12">
        <div>
            <h2 class="text-3xl font-extrabold mb-2">Event Terdekat</h2>
            <p class="text-slate-500 font-medium">
                Jangan sampai ketinggalan acara seru minggu ini!
            </p>
        </div>
    </div>

    <!-- Grid Event -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($events as $event)

        <div
            class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">

            <!-- Gambar -->
            <div class="relative overflow-hidden aspect-[3/4]">

                <img src="https://placehold.co/600x400"
                    alt="{{ $event->title }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                <!-- Nama Kategori -->
                <div
                    class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600">

                    {{ $event->category->name }}

                </div>
            </div>

            <!-- Isi Card -->
            <div class="p-6">

                <!-- Judul -->
                <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition">

                    {{ $event->title }}

                </h3>

                <!-- Tanggal -->
                <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>

                    <span>
                        {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y H:i') }}
                    </span>

                </div>

                <!-- Harga -->
                <div class="flex justify-between items-center pt-4 border-t">

                    <span class="text-2xl font-black text-indigo-600">
                        Rp {{ number_format($event->price, 0, ',', '.') }}
                    </span>

                    <!-- Tombol -->
                    <a href="{{ url('event/'.$event->id) }}"
                        class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">

                        Lihat Detail

                    </a>

                </div>

            </div>
        </div>

        @endforeach

    </div>

</section>

@endsection