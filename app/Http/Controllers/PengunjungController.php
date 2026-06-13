<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index(Request $request)
    {
        $kategori = KategoriArtikel::orderBy('nama_kategori')->get();

        $artikel = Artikel::with(['penulis', 'kategori'])
            ->when($request->kategori, function ($query) use ($request) {
                $query->where('id_kategori', $request->kategori);
            })
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('pengunjung.index', compact('artikel', 'kategori'));
    }

    public function detail($id)
    {
        $artikel = Artikel::with(['penulis', 'kategori'])->findOrFail($id);

        $terkait = Artikel::where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('pengunjung.detail', compact('artikel', 'terkait'));
    }
}