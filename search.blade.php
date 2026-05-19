@extends('layouts.app')

@section('title', 'Pencarian Kategori - ' . $keyword)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
    <li class="breadcrumb-item active">Pencarian: "{{ $keyword }}"</li>
@endsection

@section('content')

<div class="page-header">
    <h1><i class="bi bi-search me-2"></i>Hasil Pencarian</h1>
    <p>Menampilkan hasil untuk kata kunci: <strong>"{{ $keyword }}"</strong></p>
</div>

<!-- SEARCH BAR -->
<form id="searchForm2" class="mb-4">
    <div class="input-group" style="max-width:420px;">
        <input type="text" class="form-control" id="keywordInput2" value="{{ $keyword }}"
               placeholder="Cari kategori..." style="border-color:var(--border);border-radius:10px 0 0 10px;font-size:.9rem;">
        <button type="submit" class="btn btn-primary-custom px-4" style="border-radius:0 10px 10px 0;">
            <i class="bi bi-search"></i>
        </button>
    </div>
</form>
<script>
document.getElementById('searchForm2').addEventListener('submit', function(e) {
    e.preventDefault();
    const kw = document.getElementById('keywordInput2').value.trim();
    if (kw) window.location.href = '/kategori/search/' + encodeURIComponent(kw);
});
</script>

<!-- RESULT COUNT -->
<div class="mb-3">
    @if(count($hasil) > 0)
        <span style="background:var(--accent-lt);color:var(--primary);padding:.4em 1em;border-radius:20px;font-size:.88rem;font-weight:600;">
            <i class="bi bi-check-circle me-1"></i>Ditemukan {{ count($hasil) }} kategori
        </span>
    @else
        <span style="background:#fde8e8;color:#9b2424;padding:.4em 1em;border-radius:20px;font-size:.88rem;font-weight:600;">
            <i class="bi bi-x-circle me-1"></i>Tidak ditemukan kategori
        </span>
    @endif
</div>

@if(count($hasil) > 0)
<div class="row g-4">
    @foreach($hasil as $kategori)
    <div class="col-sm-6 col-lg-4">
        <div class="card h-100 p-4" style="border:2px solid var(--accent);">
            <div class="d-flex align-items-center mb-3">
                <div class="me-3 d-flex align-items-center justify-content-center rounded-3"
                     style="width:52px;height:52px;background:var(--primary);flex-shrink:0;">
                    <i class="bi bi-{{ $kategori['icon'] ?? 'book' }} fs-4" style="color:var(--accent)"></i>
                </div>
                <div>
                    {{-- Highlight keyword in nama --}}
                    @php
                        $highlighted = preg_replace(
                            '/(' . preg_quote($keyword, '/') . ')/i',
                            '<mark style="background:var(--accent-lt);color:var(--primary);border-radius:3px;padding:0 2px;">$1</mark>',
                            $kategori['nama']
                        );
                    @endphp
                    <h5 class="mb-0 fw-bold" style="font-family:'Playfair Display',serif">{!! $highlighted !!}</h5>
                    <span class="text-muted small">KAT-{{ str_pad($kategori['id'], 3, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>

            @php
                $descHighlighted = preg_replace(
                    '/(' . preg_quote($keyword, '/') . ')/i',
                    '<mark style="background:var(--accent-lt);color:var(--primary);border-radius:3px;padding:0 2px;">$1</mark>',
                    $kategori['deskripsi']
                );
            @endphp
            <p class="text-muted small mb-3 flex-grow-1">{!! $descHighlighted !!}</p>

            <div class="d-flex align-items-center justify-content-between">
                <span style="background:var(--accent-lt);color:var(--primary);padding:.3em .75em;border-radius:20px;font-size:.8rem;font-weight:600;">
                    <i class="bi bi-journal-bookmark me-1"></i>{{ $kategori['jumlah_buku'] }} Buku
                </span>
                <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-sm btn-primary-custom px-3">
                    <i class="bi bi-arrow-right me-1"></i>Lihat
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="card p-5 text-center">
    <i class="bi bi-search fs-1 mb-3" style="color:var(--muted)"></i>
    <h5 class="text-muted">Tidak ada kategori yang sesuai dengan kata kunci <strong>"{{ $keyword }}"</strong></h5>
    <a href="{{ route('kategori.index') }}" class="btn btn-primary-custom mt-3 px-4 mx-auto" style="width:fit-content;">
        <i class="bi bi-arrow-left me-2"></i>Lihat Semua Kategori
    </a>
</div>
@endif

<div class="mt-4">
    <a href="{{ route('kategori.index') }}" class="btn btn-outline-custom px-4">
        <i class="bi bi-arrow-left me-2"></i>Kembali ke Kategori
    </a>
</div>

@endsection
