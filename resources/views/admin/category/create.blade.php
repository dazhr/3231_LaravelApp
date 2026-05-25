<h1>Tambah Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <label>Nama Category</label>
    <input type="text" name="name" required>

    <br><br>

    <button type="submit">Simpan</button>
</form>

<br>

<a href="{{ route('categories.index') }}">Kembali</a>