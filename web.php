<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes — SiPustaKA
|--------------------------------------------------------------------------
*/

// ── BERANDA ──────────────────────────────────────────────────────────────
Route::get('/', function () {
    return redirect()->route('anggota.index');
});

// ── TUGAS 1: ANGGOTA ─────────────────────────────────────────────────────

Route::get('/anggota', function () {
    $anggota_list = [
        [
            'id'      => 1,
            'kode'    => 'AGT-001',
            'nama'    => 'Budi Santoso',
            'email'   => 'budi@email.com',
            'telepon' => '081234567890',
            'alamat'  => 'Jakarta',
            'status'  => 'Aktif',
        ],
        [
            'id'      => 2,
            'kode'    => 'AGT-002',
            'nama'    => 'Siti Rahayu',
            'email'   => 'siti.rahayu@email.com',
            'telepon' => '082345678901',
            'alamat'  => 'Surabaya',
            'status'  => 'Aktif',
        ],
        [
            'id'      => 3,
            'kode'    => 'AGT-003',
            'nama'    => 'Ahmad Fauzi',
            'email'   => 'fauzi.ahmad@email.com',
            'telepon' => '083456789012',
            'alamat'  => 'Bandung',
            'status'  => 'Non-Aktif',
        ],
        [
            'id'      => 4,
            'kode'    => 'AGT-004',
            'nama'    => 'Dewi Lestari',
            'email'   => 'dewi.lestari@email.com',
            'telepon' => '084567890123',
            'alamat'  => 'Yogyakarta',
            'status'  => 'Aktif',
        ],
        [
            'id'      => 5,
            'kode'    => 'AGT-005',
            'nama'    => 'Rizky Pratama',
            'email'   => 'rizky.p@email.com',
            'telepon' => '085678901234',
            'alamat'  => 'Semarang',
            'status'  => 'Aktif',
        ],
        [
            'id'      => 6,
            'kode'    => 'AGT-006',
            'nama'    => 'Nurul Hidayah',
            'email'   => 'nurul.h@email.com',
            'telepon' => '086789012345',
            'alamat'  => 'Malang',
            'status'  => 'Non-Aktif',
        ],
    ];

    return view('anggota.index', compact('anggota_list'));
})->name('anggota.index');


Route::get('/anggota/{id}', function ($id) {
    $anggota_list = [
        1 => [
            'id'      => 1,
            'kode'    => 'AGT-001',
            'nama'    => 'Budi Santoso',
            'email'   => 'budi@email.com',
            'telepon' => '081234567890',
            'alamat'  => 'Jl. Mawar No. 10, Jakarta Selatan',
            'status'  => 'Aktif',
        ],
        2 => [
            'id'      => 2,
            'kode'    => 'AGT-002',
            'nama'    => 'Siti Rahayu',
            'email'   => 'siti.rahayu@email.com',
            'telepon' => '082345678901',
            'alamat'  => 'Jl. Kenanga No. 5, Surabaya',
            'status'  => 'Aktif',
        ],
        3 => [
            'id'      => 3,
            'kode'    => 'AGT-003',
            'nama'    => 'Ahmad Fauzi',
            'email'   => 'fauzi.ahmad@email.com',
            'telepon' => '083456789012',
            'alamat'  => 'Jl. Dago No. 22, Bandung',
            'status'  => 'Non-Aktif',
        ],
        4 => [
            'id'      => 4,
            'kode'    => 'AGT-004',
            'nama'    => 'Dewi Lestari',
            'email'   => 'dewi.lestari@email.com',
            'telepon' => '084567890123',
            'alamat'  => 'Jl. Malioboro No. 8, Yogyakarta',
            'status'  => 'Aktif',
        ],
        5 => [
            'id'      => 5,
            'kode'    => 'AGT-005',
            'nama'    => 'Rizky Pratama',
            'email'   => 'rizky.p@email.com',
            'telepon' => '085678901234',
            'alamat'  => 'Jl. Pemuda No. 3, Semarang',
            'status'  => 'Aktif',
        ],
        6 => [
            'id'      => 6,
            'kode'    => 'AGT-006',
            'nama'    => 'Nurul Hidayah',
            'email'   => 'nurul.h@email.com',
            'telepon' => '086789012345',
            'alamat'  => 'Jl. Ijen No. 15, Malang',
            'status'  => 'Non-Aktif',
        ],
    ];

    if (! isset($anggota_list[$id])) {
        abort(404, 'Anggota tidak ditemukan.');
    }

    $anggota = $anggota_list[$id];

    return view('anggota.show', compact('anggota'));
})->name('anggota.show');


// ── TUGAS 2: KATEGORI (via Controller) ───────────────────────────────────
// PENTING: route statis '/kategori/search/{keyword}' harus didaftarkan
// SEBELUM '/kategori/{id}' agar tidak ditangkap sebagai {id}

Route::get('/kategori',                        [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/search/{keyword}',       [KategoriController::class, 'search'])->name('kategori.search');
Route::get('/kategori/{id}',                   [KategoriController::class, 'show'])->name('kategori.show');
