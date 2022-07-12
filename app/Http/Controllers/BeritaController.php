<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Berita::paginate();
        return view('berita.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'berita_judul' => 'required',
            'berita_isi' => 'required',
            'berita_image' => 'required',
            'berita_tanggal' => 'required'
        ]);

        $file = $request->file('berita_image');
        
        if ($file) {
            $filename = 'berita_image-' . time() . '.' . $file->getClientOriginalExtension();
            $image = $file->storeAs('public/berita_image', $filename);
        }

        $path = $image ?: null;

        $new = Berita::create([
            'berita_judul' => $request->berita_judul,
            'berita_isi' => $request->berita_isi,
            'berita_image' => $path,
            'berita_tanggal' => $request->berita_tanggal
        ]);

        if ($new) {
            return redirect(url('berita'))->with('success', 'Berita berhasil ditambahkan!.');
        }else{
            return redirect()->back()->with('error', 'Berita gagal ditambahkan!.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = Berita::findOrFail($id);
        return view('berita.edit', compact('update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'berita_judul' => 'required',
            'berita_isi' => 'required',
            'berita_tanggal' => 'required'
        ]);

        $file = $request->file('berita_image');

        $update = Berita::findOrFail($id);

        $path = $update->berita_image;
        
        if ($file) {
            $filename = 'berita_image-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/berita_image', $filename);
        }

        $data = $update->update([
            'berita_judul' => $request->berita_judul,
            'berita_isi' => $request->berita_isi,
            'berita_image' => $path,
            'berita_tanggal' => $request->berita_tanggal
        ]);

        if ($data) {
            return redirect(url('berita'))->with('success', 'Berita berhasil diperbaharui!.');
        }else{
            return redirect()->back()->with('error', 'Berita gagal diperbaharui!.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Berita::findOrFail($id);

        if ($delete->delete()) {
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
