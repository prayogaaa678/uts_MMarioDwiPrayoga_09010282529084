@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="h3 mb-4" style="color: var(--ink-dark)">Dashboard</h1>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="panel stat"><div class="num">{{ $totalBooks }}</div><div class="text-secondary">Judul buku</div></div>
    </div>
    <div class="col-md-4">
        <div class="panel stat"><div class="num">{{ $totalStock }}</div><div class="text-secondary">Total stok eksemplar</div></div>
    </div>
    <div class="col-md-4">
        <div class="panel stat"><div class="num">{{ $totalCategories }}</div><div class="text-secondary">Kategori</div></div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-7">
        <div class="panel">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                <h2 class="h6 mb-0">Buku terbaru</h2>
                <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary">Tambah buku</a>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <tbody>
                    @forelse ($latestBooks as $book)
                        <tr>
                            <td>
                                <a href="{{ route('books.show', $book) }}" class="fw-semibold text-decoration-none">{{ $book->title }}</a>
                                <div class="small text-secondary">{{ $book->author }}</div>
                            </td>
                            <td class="text-end"><span class="badge badge-cat">{{ $book->category->name }}</span></td>
                        </tr>
                    @empty
                        <tr><td class="text-secondary">Belum ada buku. Tambahkan buku pertama Anda.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="panel">
            <div class="p-3 border-bottom"><h2 class="h6 mb-0">Buku per kategori</h2></div>
            <ul class="list-group list-group-flush">
                @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('books.index', ['category' => $category->id]) }}" class="text-decoration-none">{{ $category->name }}</a>
                        <span class="text-secondary">{{ $category->books_count }} buku</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
