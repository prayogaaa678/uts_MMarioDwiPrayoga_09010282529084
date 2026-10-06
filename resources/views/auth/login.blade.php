@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<div class="row justify-content-center pt-5">
    <div class="col-md-6 col-lg-4">
        <h1 class="h3 mb-1" style="color: var(--ink-dark)">Masuk ke Perpustakaan</h1>
        <p class="text-secondary mb-4">Masuk untuk mengelola data buku.</p>

        <form action="{{ route('login.process') }}" method="POST" class="panel p-4">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror" required autofocus>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata sandi</label>
                <input type="password" id="password" name="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <button class="btn btn-primary w-100">Masuk</button>
        </form>

        <p class="small text-secondary mt-3 mb-0">
            Akun contoh: <code>admin@perpustakaan.test</code> / <code>password</code>
        </p>
    </div>
</div>
@endsection
