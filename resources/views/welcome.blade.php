@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">

    <div class="flex-1 space-y-8">

        <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
            #1 Event Platform
        </span>

        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
            Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
        </h1>

        <p class="text-lg text-slate-500 max-w-lg">
            Dari konser musik hingga workshop teknologi, semua ada di genggamanmu.
        </p>

    </div>

</section>

<!-- FILTER KATEGORI -->
<div class="mb-10 flex gap-4 justify-center flex-wrap">

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

<!-- EVENTS SECTION -->
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="mb-12">
        <h2 class="text-3xl font-extrabold mb-2">Event Terdekat</h2>
        <p class="text-slate-500">
            Jangan sampai ketinggalan event seru!
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($events as $event)

        <div class="bg-white rounded-3xl border shadow-sm overflow-hidden hover:shadow-xl transition">

            <!-- IMAGE -->
            <img src="https://placehold.co/600x400"
                 class="w-full h-64 object-cover">

            <!-- CONTENT -->
            <div class="p-6">

                <!-- CATEGORY -->
                <div class="text-xs text-indigo-600 font-bold mb-2">
                    {{ $event->category->name ?? '-' }}
                </div>

                <!-- TITLE -->
                <h3 class="text-xl font-bold mb-2">
                    {{ $event->title }}
                </h3>

                <!-- DATE -->
                <p class="text-sm text-slate-500 mb-4">
                    {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y H:i') }}
                </p>

                <!-- PRICE -->
                <div class="flex justify-between items-center">
                    <span class="text-indigo-600 font-black text-lg">
                        Rp {{ number_format($event->price, 0, ',', '.') }}
                    </span>

                    <a href="{{ url('event/'.$event->id) }}"
                       class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">
                        Detail
                    </a>
                </div>

            </div>

        </div>

        @empty
            <p class="text-center col-span-3 text-slate-400">
                Tidak ada event tersedia
            </p>
        @endforelse

    </div>

</section>

<!-- PARTNER SECTION (SOAL 4 WAJIB) -->
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="text-center mb-10">
        <h2 class="text-3xl font-extrabold">
            Partner Pendukung AmikomEventHub
        </h2>
        <p class="text-slate-500">
            Kami bekerja sama dengan berbagai partner terpercaya
        </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-6 items-center">

        @forelse($partners as $partner)

            <div class="bg-white border rounded-2xl p-4 flex items-center justify-center hover:shadow-md transition">

                @if($partner->logo_url)
                    <img src="{{ $partner->logo_url }}"
                         alt="{{ $partner->name }}"
                         class="h-12 object-contain">
                @else
                    <span class="text-slate-400 font-medium text-sm">
                        {{ $partner->name }}
                    </span>
                @endif

            </div>

        @empty

            <p class="col-span-5 text-center text-slate-400">
                Belum ada partner tersedia
            </p>

        @endforelse

    </div>

</section>

@endsection