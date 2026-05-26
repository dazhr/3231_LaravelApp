@extends('layouts.admin')

@section('title', 'Partners')
@section('page_title', 'Partners')
@section('page_subtitle', 'Kelola data partner.')

@section('content')

<div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">

    <!-- SEARCH -->
    <form method="GET" class="mb-6 flex gap-3">
        <input 
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari partner..."
            class="w-1/3 px-4 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-200"
        >

        <button class="px-5 py-2 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
            Search
        </button>

        @if(request('search'))
            <a href="{{ route('admin.partners.index') }}"
            class="px-5 py-2 bg-slate-200 text-slate-700 rounded-xl font-bold hover:bg-slate-300 transition">
                Reset
            </a>
        @endif
    </form>

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-slate-800">Daftar Partner</h2>

        <a href="{{ route('admin.partners.create') }}"
           class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
            + Add Partner
        </a>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">

            <thead>
                <tr class="border-b border-slate-200 text-sm text-slate-500 uppercase">
                    <th class="py-4 text-left">Name</th>
                    <th class="py-4 text-left">Logo</th>
                    <th class="py-4 text-right">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($partners as $partner)
                <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                    <!-- NAME -->
                    <td class="py-4 font-semibold text-slate-800">
                        {{ $partner->name }}
                    </td>

                    <!-- LOGO -->
                    <td class="py-4">
                        @if($partner->logo_url)
                            <img src="{{ $partner->logo_url }}"
                                 class="h-10 w-10 object-contain rounded-lg border bg-white">
                        @else
                            <span class="text-slate-400 text-sm">No logo</span>
                        @endif
                    </td>

                    <!-- ACTION -->
                    <td class="py-4 text-right space-x-2">

                        <a href="{{ route('admin.partners.edit', $partner->id) }}"
                           class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-xl font-semibold hover:bg-indigo-200 transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.partners.destroy', $partner->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Hapus partner ini?')">

                            @csrf
                            @method('DELETE')

                            <button class="px-4 py-2 bg-red-100 text-red-600 rounded-xl font-semibold hover:bg-red-200 transition">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>
                @empty

                <tr>
                    <td colspan="3" class="text-center py-10 text-slate-400">
                        Belum ada data partner
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection