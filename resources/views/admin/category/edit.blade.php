<h1>Edit Category</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Category</label>
    <input type="text" name="name" value="{{ $category->name }}" required>

    <br><br>

    <button type="submit">Update</button>
</form>

<br>

<a href="{{ route('categories.index') }}">Kembali</a>