<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Perpustakaan') | Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #22355a;
            --ink-dark: #17243f;
            --brass: #b8832f;
            --page: #f2f4f7;
            --bs-primary: var(--ink);
            --bs-primary-rgb: 34, 53, 90;
            --bs-link-color: var(--ink);
        }
        body { font-family: 'Nunito Sans', system-ui, sans-serif; background: var(--page); color: #1f2937; }
        h1, h2, h3, .brand { font-family: 'Libre Baskerville', Georgia, serif; }
        .navbar-lib { background: var(--ink-dark); border-bottom: 3px solid var(--brass); }
        .navbar-lib .nav-link { color: #cfd8ea; }
        .navbar-lib .nav-link.active, .navbar-lib .nav-link:hover { color: #fff; }
        .brand { color: #fff; font-size: 1.15rem; text-decoration: none; }
        .btn-primary { --bs-btn-bg: var(--ink); --bs-btn-border-color: var(--ink);
            --bs-btn-hover-bg: var(--ink-dark); --bs-btn-hover-border-color: var(--ink-dark);
            --bs-btn-active-bg: var(--ink-dark); --bs-btn-active-border-color: var(--ink-dark); }
        .btn-outline-primary { --bs-btn-color: var(--ink); --bs-btn-border-color: var(--ink);
            --bs-btn-hover-bg: var(--ink); --bs-btn-hover-border-color: var(--ink); }
        .panel { background: #fff; border: 1px solid #dde2ea; border-radius: 6px; }
        .table > :not(caption) > * > * { padding: .8rem .9rem; }
        .table thead th { background: #eaeef4; font-weight: 700; color: var(--ink-dark); border-bottom: 0; }
        /* garis punggung buku di setiap baris */
        .table tbody tr td:first-child { border-left: 4px solid var(--brass); }
        .stat { padding: 1.1rem 1.25rem; }
        .stat .num { font-family: 'Libre Baskerville', Georgia, serif; font-size: 2rem; color: var(--ink); line-height: 1.1; }
        .badge-cat { background: #e4e9f3; color: var(--ink-dark); font-weight: 600; }
        .form-label { font-weight: 600; }
        :focus-visible { outline: 3px solid var(--brass); outline-offset: 2px; }
    </style>
</head>
<body>
@auth
    <nav class="navbar navbar-expand-md navbar-lib mb-4">
        <div class="container">
            <a class="brand" href="{{ route('dashboard') }}">Perpustakaan</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-label="Buka menu">
                <span class="navbar-toggler-icon" style="filter: invert(1)"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto ms-md-4">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">Data buku</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-white-50 small">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-outline-light">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
@endauth

<main class="container pb-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
