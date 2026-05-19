@extends('layouts.app')

@section('title', 'Detail Anggota - ' . $anggota['nama'])

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Anggota</a></li>
    <li class="breadcrumb-item active">{{ $anggota['nama'] }}</li>
@endsection

@section('content')

<div class="page-header">
    <h1><i class="bi bi-person-badge me-2"></i>Detail Anggota</h1>
    <p>Informasi lengkap anggota perpustakaan</p>
</div>

<div class="row g-4">

    <!-- PROFILE CARD -->
    <div class="col-md-4">
        <div class="card p-4 text-center h-100">
            <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle"
                 style="width:90px;height:90px;background:var(--primary);font-family:'Playfair Display',serif;font-size:2.2rem;color:var(--accent)">
                {{ strtoupper(substr($anggota['nama'], 0, 1)) }}
            </div>
            <h4 style="font-family:'Playfair Display',serif">{{ $anggota['nama'] }}</h4>
            <p class="text-muted mb-2">{{ $anggota['email'] }}</p>

            <div class="mb-3">
                @if($anggota['status'] === 'Aktif')
                    <span class="badge-aktif fs-6"><i class="bi bi-patch-check me-1"></i>Anggota Aktif</span>
                @else
                    <span class="badge-nonaktif fs-6"><i class="bi bi-patch-exclamation me-1"></i>Non-Aktif</span>
                @endif
            </div>

            <code style="background:var(--accent-lt);color:var(--primary);padding:.4em .9em;border-radius:8px;font-size:1rem;font-weight:600;">
                {{ $anggota['kode'] }}
            </code>
        </div>
    </div>

    <!-- DETAIL INFO CARD -->
    <div class="col-md-8">
        <div class="card h-100">
            <div class="card-header py-3 px-4" style="background:white;border-bottom:1px solid var(--border);">
                <h5 class="mb-0 fw-semibold" style="font-family:'Playfair Display',serif">
                    <i class="bi bi-info-circle me-2" style="color:var(--accent)"></i>Informasi Lengkap
                </h5>
            </div>
            <div class="card-body px-4">
                @php
                $fields = [
                    ['icon' => 'upc-scan',       'label' => 'Kode Anggota',   'value' => $anggota['kode'],     'code' => true],
                    ['icon' => 'person-fill',    'label' => 'Nama Lengkap',   'value' => $anggota['nama'],     'code' => false],
                    ['icon' => 'envelope-fill',  'label' => 'Email',          'value' => $anggota['email'],    'code' => false],
                    ['icon' => 'telephone-fill', 'label' => 'Telepon',        'value' => $anggota['telepon'],  'code' => false],
                    ['icon' => 'geo-alt-fill',   'label' => 'Alamat',         'value' => $anggota['alamat'],   'code' => false],
                ];
                @endphp

                @foreach($fields as $field)
                <div class="d-flex align-items-start py-3 {{ !$loop->last ? 'border-bottom' : '' }}" style="border-color:var(--border)!important">
                    <div class="me-3 mt-1 d-flex align-items-center justify-content-center rounded-circle"
                         style="width:38px;height:38px;background:var(--accent-lt);flex-shrink:0;">
                        <i class="bi bi-{{ $field['icon'] }}" style="color:var(--primary)"></i>
                    </div>
                    <div>
                        <div class="text-muted small mb-1">{{ $field['label'] }}</div>
                        @if($field['code'])
                            <code style="font-size:.95rem;color:var(--primary);font-weight:600;">{{ $field['value'] }}</code>
                        @else
                            <div class="fw-semibold">{{ $field['value'] }}</div>
                        @endif
                    </div>
                </div>
                @endforeach

                <!-- STATUS ROW -->
                <div class="d-flex align-items-start py-3">
                    <div class="me-3 mt-1 d-flex align-items-center justify-content-center rounded-circle"
                         style="width:38px;height:38px;background:var(--accent-lt);flex-shrink:0;">
                        <i class="bi bi-toggle-on" style="color:var(--primary)"></i>
                    </div>
                    <div>
                        <div class="text-muted small mb-1">Status Keanggotaan</div>
                        @if($anggota['status'] === 'Aktif')
                            <span class="badge-aktif"><i class="bi bi-check-circle me-1"></i>Aktif</span>
                        @else
                            <span class="badge-nonaktif"><i class="bi bi-x-circle me-1"></i>Non-Aktif</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BACK BUTTON -->
<div class="mt-4">
    <a href="{{ route('anggota.index') }}" class="btn btn-outline-custom px-4">
        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Anggota
    </a>
</div>

@endsection
