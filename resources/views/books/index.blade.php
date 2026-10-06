@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <h1 class="h3 mb-0" style="color: var(--ink-dark)">Daftar buku</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah buku</a>
</div>

<form method="GET" action="{{ route('books.index') }}" class="panel p-3 mb-3">
    <div class="row g-2">
        <div class="col-md-6">
            <label for="q" class="visually-hidden">Cari buku</label>
            <input type="search" id="q" name="q" value="{{ request('q') }}" class="form-control"
                   placeholder="Cari berdasarkan judul atau penulis">
        </div>
        <div class="col-md-3">
            <label for="category" class="visually-hidden">Kategori</label>
            <select id="category" name="category" class="form-select">
                <option value="">Semua kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-primary flex-fill">Cari</button>
            @if (request('q') || request('category'))
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Reset</a>
            @endif
        </div>
    </div>
</form>

<div class="panel">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Tahun</th>
                    <th class="text-end">Stok</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $books->firstItem() + $loop->index }}</td>
                    <td class="fw-semibold">{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td><span class="badge badge-cat">{{ $book->category->name }}</span></td>
                    <td>{{ $book->year }}</td>
                    <td class="text-end">{{ $book->stock }}</td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus buku &quot;{{ addslashes($book->title) }}&quot;? Tindakan ini tidak bisa dibatalkan.')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-secondary py-4">
                        Tidak ada buku yang cocok. Ubah kata kunci pencarian atau tambahkan buku baru.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $books->links() }}</div>
@endsection
