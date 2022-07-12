<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Berita;
use App\Models\Tentang;
use App\Models\Struktur;

class FrontController extends Controller
{
    public function index()
    {
        $activities = Kegiatan::orderBy('created_at')->limit(4)->get();
        $news = Berita::orderBy('created_at')->limit(4)->get();
        return view('front.index', compact('activities','news'));
    }
    public function sekilas()
    {
        $sekilas = Tentang::first();
        return view('front.sekilas', compact('sekilas'));
    }
    public function struktur()
    {
        $struktur = Struktur::first();
        return view('front.struktur', compact('struktur'));
    }
}
