@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
    <div>
        <h1 class="h3 mb-1" style="color: var(--ink-dark)">{{ $book->title }}</h1>
        <span class="badge badge-cat">{{ $book->category->name }}</span>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">Edit buku</a>
        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
</div>

<div class="panel p-4">
    <dl class="row mb-0">
        <dt class="col-sm-3">Penulis</dt>
        <dd class="col-sm-9">{{ $book->author }}</dd>

        <dt class="col-sm-3">Penerbit</dt>
        <dd class="col-sm-9">{{ $book->publisher }}</dd>

        <dt class="col-sm-3">Tahun terbit</dt>
        <dd class="col-sm-9">{{ $book->year }}</dd>

        <dt class="col-sm-3">Stok</dt>
        <dd class="col-sm-9">{{ $book->stock }} eksemplar</dd>

        <dt class="col-sm-3">Kategori</dt>
        <dd class="col-sm-9">
            {{ $book->category->name }}
            @if ($book->category->description)
                <div class="small text-secondary">{{ $book->category->description }}</div>
            @endif
        </dd>

        <dt class="col-sm-3">Ditambahkan</dt>
        <dd class="col-sm-9">{{ $book->created_at->format('d M Y, H:i') }}</dd>

        <dt class="col-sm-3">Diperbarui</dt>
        <dd class="col-sm-9 mb-0">{{ $book->updated_at->format('d M Y, H:i') }}</dd>
    </dl>
</div>
@endsection
