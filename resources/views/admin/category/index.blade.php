<h1>Data Categories</h1>

<!-- SEARCH -->
<form method="GET" action="{{ route('categories.index') }}">
    <input type="text" name="search" placeholder="Cari kategori...">
    <button>Cari</button>
</form>

<!-- BUTTON CREATE -->
<a href="{{ route('categories.create') }}">
    <button>+ Tambah Kategori</button>
</a>

<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Aksi</th>
    </tr>

    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td>

            <!-- EDIT -->
            <a href="{{ route('categories.edit', $category->id) }}">
                <button>Edit</button>
            </a>

            <!-- DELETE -->
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>

        </td>
    </tr>
    @endforeach
</table>