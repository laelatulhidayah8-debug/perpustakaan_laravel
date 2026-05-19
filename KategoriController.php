<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Data kategori (simulasi database).
     */
    private array $kategori_list = [
        [
            'id'          => 1,
            'nama'        => 'Programming',
            'deskripsi'   => 'Buku pemrograman dan coding — mulai dari dasar hingga tingkat lanjut.',
            'jumlah_buku' => 25,
            'icon'        => 'code-slash',
        ],
        [
            'id'          => 2,
            'nama'        => 'Matematika',
            'deskripsi'   => 'Buku matematika mencakup aljabar, kalkulus, statistika, dan teori bilangan.',
            'jumlah_buku' => 18,
            'icon'        => 'calculator',
        ],
        [
            'id'          => 3,
            'nama'        => 'Sastra & Fiksi',
            'deskripsi'   => 'Karya sastra Indonesia dan dunia, novel, puisi, dan antologi cerpen.',
            'jumlah_buku' => 32,
            'icon'        => 'book-half',
        ],
        [
            'id'          => 4,
            'nama'        => 'Sejarah',
            'deskripsi'   => 'Buku sejarah Indonesia, Asia, dan dunia dari berbagai periode.',
            'jumlah_buku' => 14,
            'icon'        => 'hourglass-split',
        ],
        [
            'id'          => 5,
            'nama'        => 'Sains & Teknologi',
            'deskripsi'   => 'Fisika, kimia, biologi, astronomi, dan perkembangan teknologi terkini.',
            'jumlah_buku' => 21,
            'icon'        => 'cpu',
        ],
    ];

    /**
     * Data buku per kategori (simulasi).
     */
    private array $buku_data = [
        1 => [
            ['judul' => 'Clean Code',                'penulis' => 'Robert C. Martin',   'tahun' => 2008, 'stok' => 3],
            ['judul' => 'Laravel: Up & Running',     'penulis' => 'Matt Stauffer',       'tahun' => 2022, 'stok' => 5],
            ['judul' => 'The Pragmatic Programmer',  'penulis' => 'Hunt & Thomas',       'tahun' => 2019, 'stok' => 2],
            ['judul' => 'Design Patterns',           'penulis' => 'Gang of Four',        'tahun' => 1994, 'stok' => 1],
            ['judul' => 'You Don\'t Know JS',        'penulis' => 'Kyle Simpson',        'tahun' => 2020, 'stok' => 4],
        ],
        2 => [
            ['judul' => 'Kalkulus Jilid I',          'penulis' => 'James Stewart',       'tahun' => 2015, 'stok' => 6],
            ['judul' => 'Statistika Dasar',          'penulis' => 'Sudjana',             'tahun' => 2018, 'stok' => 4],
            ['judul' => 'Aljabar Linear',            'penulis' => 'Howard Anton',        'tahun' => 2013, 'stok' => 3],
            ['judul' => 'Teori Bilangan',            'penulis' => 'Budi Cahyono',        'tahun' => 2017, 'stok' => 2],
        ],
        3 => [
            ['judul' => 'Laskar Pelangi',            'penulis' => 'Andrea Hirata',       'tahun' => 2005, 'stok' => 7],
            ['judul' => 'Bumi Manusia',              'penulis' => 'Pramoedya A. Toer',   'tahun' => 1980, 'stok' => 4],
            ['judul' => 'Tenggelamnya Kapal Van Der Wijck', 'penulis' => 'Hamka',        'tahun' => 1938, 'stok' => 3],
            ['judul' => 'Harry Potter & Batu Bertuah', 'penulis' => 'J.K. Rowling',     'tahun' => 1997, 'stok' => 5],
            ['judul' => 'Dilan 1990',                'penulis' => 'Pidi Baiq',           'tahun' => 2014, 'stok' => 6],
        ],
        4 => [
            ['judul' => 'Sejarah Indonesia Modern',  'penulis' => 'M.C. Ricklefs',       'tahun' => 2012, 'stok' => 2],
            ['judul' => 'Revolusi Belum Selesai',    'penulis' => 'Taufik Abdullah',     'tahun' => 2001, 'stok' => 1],
            ['judul' => 'Perang Dunia II',           'penulis' => 'Anthony Beevor',      'tahun' => 2012, 'stok' => 3],
            ['judul' => 'Kisah Para Rasul',          'penulis' => 'Suheyl Umar',         'tahun' => 2010, 'stok' => 4],
        ],
        5 => [
            ['judul' => 'Fisika Dasar Jilid I',      'penulis' => 'Halliday & Resnick',  'tahun' => 2014, 'stok' => 5],
            ['judul' => 'Kimia Organik',             'penulis' => 'John McMurry',        'tahun' => 2011, 'stok' => 3],
            ['judul' => 'A Brief History of Time',   'penulis' => 'Stephen Hawking',     'tahun' => 1988, 'stok' => 4],
            ['judul' => 'The Gene',                  'penulis' => 'Siddhartha Mukherjee','tahun' => 2016, 'stok' => 2],
            ['judul' => 'Sapiens',                   'penulis' => 'Yuval Noah Harari',   'tahun' => 2011, 'stok' => 6],
        ],
    ];

    // ─────────────────────────────────────────────
    //  INDEX — Daftar semua kategori
    // ─────────────────────────────────────────────
    public function index()
    {
        $kategori_list = $this->kategori_list;

        return view('kategori.index', compact('kategori_list'));
    }

    // ─────────────────────────────────────────────
    //  SHOW — Detail satu kategori + buku
    // ─────────────────────────────────────────────
    public function show($id)
    {
        // Cari kategori berdasarkan id
        $kategori = collect($this->kategori_list)->firstWhere('id', (int) $id);

        if (! $kategori) {
            abort(404, 'Kategori tidak ditemukan.');
        }

        // Buku dalam kategori ini
        $buku_list = $this->buku_data[(int) $id] ?? [];

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    // ─────────────────────────────────────────────
    //  SEARCH — Cari kategori berdasarkan keyword
    // ─────────────────────────────────────────────
    public function search($keyword)
    {
        $keyword = trim($keyword);

        // Filter: nama atau deskripsi mengandung keyword (case-insensitive)
        $hasil = array_values(array_filter(
            $this->kategori_list,
            fn($k) => str_contains(strtolower($k['nama']), strtolower($keyword))
                   || str_contains(strtolower($k['deskripsi']), strtolower($keyword))
        ));

        return view('kategori.search', compact('hasil', 'keyword'));
    }
}
