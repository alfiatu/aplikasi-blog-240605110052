@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-secondary mb-0">
        Data Kategori
    </h4>

    <a href="{{ route('kategori.create') }}"
       class="btn btn-success">
        + Tambah Kategori
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="80">ID</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th width="180" class="text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($kategori as $item)
                        <tr>
                            <td>{{ $item->id }}</td>

                            <td>
                                {{ $item->nama_kategori }}
                            </td>

                            <td>
                                {{ $item->keterangan }}
                            </td>

                            <td class="text-center">

                                <a href="{{ route('kategori.edit', $item->id) }}"
                                   class="btn btn-sm"
                                    style="background-color:#e3f2fd; color:#1565c0; font-size:12px;">
                                    Edit
                                </a>

                                <form action="{{ route('kategori.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                   <button type="submit"
                                            class="btn btn-sm"
                                            style="background-color:#ffebee; color:#c62828; font-size:12px;">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                class="text-center py-4 text-muted">
                                Belum ada data kategori.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection