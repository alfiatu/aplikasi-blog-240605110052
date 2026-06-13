<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;
use App\Models\Penulis;
use App\Models\KategoriArtikel;

class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar artikel.
     */
    public function index()
    {
        $artikel = Artikel::with('penulis', 'kategori')
            ->orderBy('id', 'desc')
            ->get();

        return view('artikel.index', compact('artikel'));
    }

    /**
     * Menampilkan form tambah artikel.
     */
    public function create()
    {
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        $penulis = Penulis::orderBy('nama_depan', 'asc')->get();

        return view('artikel.create', compact('kategori', 'penulis'));
    }

    /**
     * Menyimpan artikel baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'isi'         => 'required|string',
            'id_penulis'  => 'required|exists:penulis,id',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'gambar'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('gambar');
        $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('gambar', $namaFile, 'public');

        Artikel::create([
            'judul'        => $request->judul,
            'isi'          => $request->isi,
            'id_penulis'   => $request->id_penulis,
            'id_kategori'  => $request->id_kategori,
            'gambar'       => $namaFile,
            'hari_tanggal' => now()
                ->timezone('Asia/Jakarta')
                ->locale('id')
                ->isoFormat('dddd, D MMMM Y | HH:mm'),
        ]);

        return redirect()
            ->route('artikel.index')
            ->with('sukses', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit artikel.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        $penulis = Penulis::orderBy('nama_depan', 'asc')->get();

        return view('artikel.edit', compact(
            'artikel',
            'kategori',
            'penulis'
        ));
    }

    /**
     * Memperbarui artikel.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul'       => 'required|string|max:255',
            'isi'         => 'required|string',
            'id_penulis'  => 'required|exists:penulis,id',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'judul'       => $request->judul,
            'isi'         => $request->isi,
            'id_penulis'  => $request->id_penulis,
            'id_kategori' => $request->id_kategori,
        ];

        if ($request->hasFile('gambar')) {

            if ($artikel->gambar) {
                Storage::disk('public')->delete('gambar/' . $artikel->gambar);
            }

            $file = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('gambar', $namaFile, 'public');

            $data['gambar'] = $namaFile;
        }

        $artikel->update($data);

        return redirect()
            ->route('artikel.index')
            ->with('sukses', 'Artikel berhasil diperbarui.');
    }

    /**
     * Menghapus artikel.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar) {
            Storage::disk('public')->delete('gambar/' . $artikel->gambar);
        }

        $artikel->delete();

        return redirect()
            ->route('artikel.index')
            ->with('sukses', 'Artikel berhasil dihapus.');
    }
}