@extends('layouts.pengunjung')

@section('title', $artikel->judul)

@section('content')
<div class="row">

    <!-- Detail Artikel -->
    <div class="col-md-8">
        <div class="card shadow-sm mb-4">
            <img
                src="{{ asset('storage/gambar/' . $artikel->gambar) }}"
                class="card-img-top"
                style="height: 350px; object-fit: cover;"
                alt="{{ $artikel->judul }}">

            <div class="card-body">
                <h2 class="mb-3">{{ $artikel->judul }}</h2>

                <p class="text-muted mb-3">
                    <strong>Kategori:</strong>
                    {{ $artikel->kategori->nama_kategori }}
                    |
                    <strong>Penulis:</strong>
                    {{ $artikel->penulis->nama_depan }}
                    {{ $artikel->penulis->nama_belakang }}
                    |
                    <strong>Tanggal:</strong>
                    {{ $artikel->hari_tanggal }}
                </p>

                <hr>

                <div style="text-align: justify;">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn btn-secondary">
            ← Kembali ke Beranda
        </a>
    </div>

    <!-- Sidebar Artikel Terkait -->
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">
                Artikel Terkait
            </div>

            <div class="list-group list-group-flush">
                @forelse ($terkait as $item)
                    <a href="{{ route('detail.artikel', $item->id) }}"
                        class="list-group-item list-group-item-action">

                        <strong>{{ $item->judul }}</strong>
                        <br>

                        <small class="text-muted">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 60) }}
                        </small>
                    </a>
                @empty
                    <div class="list-group-item text-muted">
                        Tidak ada artikel terkait.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection