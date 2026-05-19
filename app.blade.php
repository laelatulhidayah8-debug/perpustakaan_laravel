<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital') | SiPustaKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:    #1a3a2a;
            --accent:     #c8a84b;
            --accent-lt:  #f5e6bb;
            --surface:    #f7f5f0;
            --card-bg:    #ffffff;
            --text:       #1c1c1c;
            --muted:      #6c7a6a;
            --border:     #e0dbd0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--surface);
            color: var(--text);
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: var(--primary) !important;
            border-bottom: 3px solid var(--accent);
            padding: 0.85rem 0;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.55rem;
            color: var(--accent) !important;
            letter-spacing: .5px;
        }
        .navbar-brand span { color: #fff; }
        .nav-link {
            color: rgba(255,255,255,.8) !important;
            font-weight: 500;
            font-size: .92rem;
            padding: .45rem .9rem !important;
            border-radius: 6px;
            transition: background .2s, color .2s;
        }
        .nav-link:hover, .nav-link.active {
            background: rgba(200,168,75,.18);
            color: var(--accent) !important;
        }
        .nav-link i { margin-right: 5px; }

        /* ── BREADCRUMB ── */
        .breadcrumb-wrap {
            background: var(--primary);
            opacity: .9;
            padding: .55rem 0;
        }
        .breadcrumb-item a { color: var(--accent-lt); text-decoration: none; font-size: .85rem; }
        .breadcrumb-item.active { color: rgba(255,255,255,.6); font-size: .85rem; }
        .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,.35); }

        /* ── CONTENT ── */
        .main-content { padding: 2rem 0 3rem; }

        /* ── PAGE HEADER ── */
        .page-header {
            background: var(--primary);
            color: white;
            border-radius: 14px;
            padding: 1.8rem 2rem;
            margin-bottom: 1.8rem;
            border-left: 5px solid var(--accent);
            position: relative;
            overflow: hidden;
        }
        .page-header::after {
            content: '';
            position: absolute;
            right: -30px; top: -30px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(200,168,75,.12);
        }
        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            margin: 0;
        }
        .page-header p { margin: .3rem 0 0; color: rgba(255,255,255,.65); font-size: .9rem; }

        /* ── CARDS ── */
        .card {
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--card-bg);
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
            transition: transform .2s, box-shadow .2s;
        }
        .card:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0,0,0,.1); }

        /* ── TABLE ── */
        .table-custom thead {
            background: var(--primary);
            color: white;
        }
        .table-custom thead th { font-weight: 500; font-size: .88rem; letter-spacing: .4px; padding: .85rem 1rem; border: none; }
        .table-custom tbody td { padding: .8rem 1rem; vertical-align: middle; border-color: var(--border); font-size: .9rem; }
        .table-custom tbody tr:hover { background: rgba(200,168,75,.07); }

        /* ── BADGES ── */
        .badge-aktif  { background: #d1f0e0; color: #1a6b3c; font-weight: 600; padding: .35em .75em; border-radius: 20px; font-size: .78rem; }
        .badge-nonaktif { background: #fde8e8; color: #9b2424; font-weight: 600; padding: .35em .75em; border-radius: 20px; font-size: .78rem; }

        /* ── BUTTONS ── */
        .btn-primary-custom {
            background: var(--primary); color: white; border: none;
            border-radius: 8px; font-weight: 500;
            transition: background .2s, transform .15s;
        }
        .btn-primary-custom:hover { background: #254d38; color: white; transform: translateY(-1px); }
        .btn-accent {
            background: var(--accent); color: var(--primary); border: none;
            border-radius: 8px; font-weight: 600;
        }
        .btn-accent:hover { background: #b8943b; color: var(--primary); }
        .btn-outline-custom {
            border: 2px solid var(--primary); color: var(--primary);
            border-radius: 8px; font-weight: 500;
            background: transparent;
        }
        .btn-outline-custom:hover { background: var(--primary); color: white; }

        /* ── FOOTER ── */
        footer {
            background: var(--primary);
            color: rgba(255,255,255,.55);
            padding: 1.2rem 0;
            font-size: .83rem;
            text-align: center;
            border-top: 3px solid var(--accent);
        }
        footer span { color: var(--accent); }

        @yield('styles')
    </style>
    @stack('styles')
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="bi bi-book-half me-1"></i>SiPusta<span>KA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                        <i class="bi bi-house-door"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('anggota*') ? 'active' : '' }}" href="{{ route('anggota.index') }}">
                        <i class="bi bi-people"></i> Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                        <i class="bi bi-tags"></i> Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-journal-bookmark"></i> Buku
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- BREADCRUMB -->
@hasSection('breadcrumb')
<div class="breadcrumb-wrap">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door me-1"></i>Beranda</a></li>
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>
</div>
@endif

<!-- MAIN CONTENT -->
<main class="main-content">
    <div class="container">
        @yield('content')
    </div>
</main>

<!-- FOOTER -->
<footer>
    <p class="mb-0">&copy; {{ date('Y') }} <span>SiPustaKA</span> — Sistem Informasi Perpustakaan Digital. Dibuat dengan <span>♥</span> menggunakan Laravel & Bootstrap 5.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
