@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<h1 class="h3 mb-3" style="color: var(--ink-dark)">Edit buku</h1>

<form action="{{ route('books.update', $book) }}" method="POST" class="panel p-4">
    @csrf
    @method('PUT')
    @include('books._form')
    <div class="mt-4 d-flex gap-2">
        <button class="btn btn-primary">Simpan perubahan</button>
        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
</form>
@endsection
