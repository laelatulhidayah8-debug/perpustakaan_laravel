@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('breadcrumb')
    <li class="breadcrumb-item active">Anggota</li>
@endsection

@section('content')

<div class="page-header">
    <h1><i class="bi bi-people-fill me-2"></i>Daftar Anggota Perpustakaan</h1>
    <p>Kelola seluruh data anggota perpustakaan SiPustaKA</p>
</div>

<!-- STATS ROW -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card text-center p-3">
            <div class="fw-bold fs-2" style="color:var(--primary)">{{ count($anggota_list) }}</div>
            <div class="text-muted small">Total Anggota</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card text-center p-3">
            <div class="fw-bold fs-2" style="color:#1a6b3c">
                {{ count(array_filter($anggota_list, fn($a) => $a['status'] === 'Aktif')) }}
            </div>
            <div class="text-muted small">Anggota Aktif</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card text-center p-3">
            <div class="fw-bold fs-2" style="color:#9b2424">
                {{ count(array_filter($anggota_list, fn($a) => $a['status'] === 'Non-Aktif')) }}
            </div>
            <div class="text-muted small">Anggota Non-Aktif</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card text-center p-3">
            <div class="fw-bold fs-2" style="color:var(--accent)">2024</div>
            <div class="text-muted small">Tahun Berjalan</div>
        </div>
    </div>
</div>

<!-- TABLE CARD -->
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between py-3 px-4" style="background:white;border-bottom:1px solid var(--border);">
        <h5 class="mb-0 fw-semibold" style="font-family:'Playfair Display',serif">
            <i class="bi bi-table me-2" style="color:var(--accent)"></i>Tabel Anggota
        </h5>
        <span class="badge" style="background:var(--accent-lt);color:var(--primary);font-size:.82rem;padding:.45em .9em;border-radius:20px;">
            {{ count($anggota_list) }} Anggota
        </span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Anggota</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota_list as $index => $anggota)
                    <tr>
                        <td class="text-muted fw-semibold">{{ $index + 1 }}</td>
                        <td>
                            <code style="background:var(--accent-lt);color:var(--primary);padding:.2em .55em;border-radius:5px;font-size:.82rem;">
                                {{ $anggota['kode'] }}
                            </code>
                        </td>
                        <td class="fw-semibold">
                            <i class="bi bi-person-circle me-1" style="color:var(--muted)"></i>
                            {{ $anggota['nama'] }}
                        </td>
                        <td class="text-muted">{{ $anggota['email'] }}</td>
                        <td class="text-muted">
                            <i class="bi bi-geo-alt me-1"></i>{{ $anggota['alamat'] }}
                        </td>
                        <td>
                            @if($anggota['status'] === 'Aktif')
                                <span class="badge-aktif"><i class="bi bi-check-circle me-1"></i>Aktif</span>
                            @else
                                <span class="badge-nonaktif"><i class="bi bi-x-circle me-1"></i>Non-Aktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('anggota.show', $anggota['id']) }}" class="btn btn-sm btn-primary-custom px-3">
                                <i class="bi bi-eye me-1"></i>Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
