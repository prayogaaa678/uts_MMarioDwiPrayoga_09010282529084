<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Perpustakaan') | Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #1f5f4a; --ink-dark: #123c2f; --brass: #d89b2b;
            --page: #f4f6f4; --line: #e1e8e4; --side-w: 250px;
            --bs-primary: var(--ink); --bs-primary-rgb: 31, 95, 74;
            --bs-link-color: var(--ink); --bs-link-hover-color: var(--ink-dark);
        }
        body { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; background: var(--page); color: #1c2a25; }
        h1, h2, h3, .brand { font-family: 'Fraunces', Georgia, serif; font-weight: 700; }

        /* ---------- Sidebar ---------- */
        .sidebar {
            position: fixed; inset: 0 auto 0 0; width: var(--side-w);
            background: var(--ink-dark); display: flex; flex-direction: column; padding: 1.5rem 1rem;
        }
        .brand { color: #fff; font-size: 1.45rem; text-decoration: none; padding: 0 .75rem 1.5rem;
                 border-bottom: 1px solid rgba(255,255,255,.12); margin-bottom: 1.25rem; display: block; }
        .brand:hover { color: #fff; }
        .brand small { display: block; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 500;
                       font-size: .75rem; color: #9fc2b4; margin-top: .15rem; }
        .side-link { display: block; color: #bcd3c9; text-decoration: none; font-weight: 500;
                     padding: .7rem .9rem; border-radius: 10px; margin-bottom: .25rem; border-left: 4px solid transparent; }
        .side-link:hover { color: #fff; background: rgba(255,255,255,.07); }
        .side-link.active { color: #fff; background: rgba(255,255,255,.12); border-left-color: var(--brass); }
        .side-user { margin-top: auto; padding: 1rem .75rem 0; border-top: 1px solid rgba(255,255,255,.12); }
        .side-user .name { color: #fff; font-weight: 600; font-size: .92rem; }
        .side-user .role { color: #9fc2b4; font-size: .78rem; margin-bottom: .75rem; }

        .content { margin-left: var(--side-w); padding: 2rem 2.25rem 1rem; }
        .content.guest { margin-left: 0; }
        footer.site-footer { color: #7a8a83; font-size: .82rem; padding: 1.5rem 0 1rem; }

        /* ---------- Komponen ---------- */
        .btn { border-radius: 10px; font-weight: 600; }
        .btn-primary { --bs-btn-bg: var(--ink); --bs-btn-border-color: var(--ink);
            --bs-btn-hover-bg: var(--ink-dark); --bs-btn-hover-border-color: var(--ink-dark);
            --bs-btn-active-bg: var(--ink-dark); --bs-btn-active-border-color: var(--ink-dark); }
        .btn-outline-primary { --bs-btn-color: var(--ink); --bs-btn-border-color: var(--ink);
            --bs-btn-hover-bg: var(--ink); --bs-btn-hover-border-color: var(--ink); }

        .panel { background: #fff; border: 1px solid var(--line); border-radius: 16px;
                 box-shadow: 0 1px 3px rgba(18,60,47,.06); overflow: hidden; }
        .panel > .p-3.border-bottom { background: #fafcfb; }

        .table { --bs-table-hover-bg: #f3f8f5; margin-bottom: 0; }
        .table > :not(caption) > * > * { padding: .9rem 1.05rem; }
        .table thead th { background: #eef3f0; color: var(--ink-dark); font-weight: 700; font-size: .88rem;
                          border-bottom: 1px solid var(--line); white-space: nowrap; }
        .table tbody tr td:first-child { border-left: 4px solid var(--brass); }

        .stat { padding: 1.4rem 1.5rem; }
        .stat .num { font-family: 'Fraunces', Georgia, serif; font-size: 2.6rem; font-weight: 700;
                     color: var(--ink); line-height: 1; margin-bottom: .35rem; }
        .badge-cat { background: #dcebe4; color: var(--ink-dark); font-weight: 600; padding: .42em .8em; border-radius: 999px; }

        .form-label { font-weight: 600; color: var(--ink-dark); }
        .form-control, .form-select { border-radius: 10px; border-color: #cfdad5; padding: .62rem .85rem; }
        .form-control:focus, .form-select:focus { border-color: var(--ink); box-shadow: 0 0 0 .2rem rgba(31,95,74,.18); }
        .alert { border: 0; border-radius: 12px; }
        .pagination { --bs-pagination-active-bg: var(--ink); --bs-pagination-active-border-color: var(--ink); --bs-pagination-color: var(--ink); }
        :focus-visible { outline: 3px solid var(--brass); outline-offset: 2px; }

        /* ---------- Layar kecil: sidebar jadi bar atas ---------- */
        @media (max-width: 991px) {
            .sidebar { position: static; width: 100%; flex-direction: row; flex-wrap: wrap; align-items: center;
                       gap: .5rem; padding: .75rem 1rem; }
            .brand { border: 0; margin: 0; padding: 0 .5rem 0 0; font-size: 1.2rem; }
            .brand small { display: none; }
            .side-link { margin: 0; }
            .side-user { margin: 0 0 0 auto; padding: 0; border: 0; display: flex; align-items: center; gap: .75rem; }
            .side-user .role { display: none; }
            .side-user .role + form, .side-user .name { margin: 0; }
            .content { margin-left: 0; padding: 1.25rem 1rem 1rem; }
        }
    </style>
</head>
<body>
@auth
    <aside class="sidebar">
        <a class="brand" href="{{ route('dashboard') }}">Perpustakaan<small>Pengelolaan data buku</small></a>
        <nav>
            <a class="side-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="side-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">Data buku</a>
        </nav>
        <div class="side-user">
            <div class="name">{{ auth()->user()->name }}</div>
            <div class="role">Petugas perpustakaan</div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-outline-light w-100">Keluar</button>
            </form>
        </div>
    </aside>
@endauth

<div class="content {{ auth()->check() ? '' : 'guest' }}">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @yield('content')

    <footer class="site-footer">UTS Pemrograman Web III</footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>