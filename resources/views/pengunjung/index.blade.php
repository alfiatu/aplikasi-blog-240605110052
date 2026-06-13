@extends('layouts.pengunjung')

@section('title', 'Beranda')

@section('content')
<div class="row">

    <!-- Daftar Artikel -->
    <div class="col-md-8">
        <h3 class="mb-4">Artikel Terbaru</h3>

        @forelse ($artikel as $item)
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('storage/gambar/' . $item->gambar) }}"
                     class="card-img-top"
                     style="height:250px; object-fit:cover;"
                     alt="{{ $item->judul }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>

                    <p class="text-muted mb-2">
                        Kategori:
                        <strong>{{ $item->kategori->nama_kategori }}</strong>
                        |
                        Penulis:
                        <strong>
                            {{ $item->penulis->nama_depan }}
                            {{ $item->penulis->nama_belakang }}
                        </strong>
                    </p>

                    <p class="card-text">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 150) }}
                    </p>

                    <a href="{{ route('detail.artikel', $item->id) }}"
                       class="btn btn-primary btn-sm">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Belum ada artikel.
            </div>
        @endforelse
    </div>

    <!-- Sidebar Kategori -->
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">
                Kategori Artikel
            </div>

            <div class="list-group list-group-flush">
                <a href="{{ route('home') }}"
                   class="list-group-item list-group-item-action">
                    Semua Kategori
                </a>

                @foreach ($kategori as $item)
                    <a href="{{ route('home', ['kategori' => $item->id]) }}"
                       class="list-group-item list-group-item-action">
                        {{ $item->nama_kategori }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection