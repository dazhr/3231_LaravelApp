@extends('layouts.admin')

@section('title', 'List Categories - Admin')
@section('page_title', 'Categories')
@section('page_subtitle', 'Kelola semua kategori event.')

@section('content')
<div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">

    <!-- SEARCH -->
    <form method="GET" class="mb-6 flex gap-3">
        <input 
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari category..."
            class="w-1/3 px-4 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-200"
        >

        <button class="px-5 py-2 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
            Search
        </button>

        @if(request('search'))
            <a href="{{ route('admin.categories.index') }}"
            class="px-5 py-2 bg-slate-200 text-slate-700 rounded-xl font-bold hover:bg-slate-300 transition">
                Reset
            </a>
        @endif
    </form>

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-slate-800">Daftar Categories</h2>

        <a href="{{ route('admin.categories.create') }}"
           class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
            + Tambah Category
        </a>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 text-slate-500 text-sm uppercase">
                    <th class="py-3">No</th>
                    <th class="py-3">Nama</th>
                    <th class="py-3">Slug</th>
                    <th class="py-3 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $index => $category)
                <tr class="border-b border-slate-100 hover:bg-slate-50 transition">
                    <td class="py-4 font-medium">
                        {{ $index + 1 }}
                    </td>

                    <td class="py-4 font-semibold text-slate-800">
                        {{ $category->name }}
                    </td>

                    <td class="py-4 text-slate-500">
                        {{ $category->slug }}
                    </td>

                    <td class="py-4 text-right space-x-3">

                        <!-- EDIT -->
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-xl font-bold hover:bg-indigo-200 transition">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Yakin mau hapus category ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="px-4 py-2 bg-red-100 text-red-600 rounded-xl font-bold hover:bg-red-200 transition">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-10 text-slate-400">
                        Belum ada category
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection