<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanFoto;
use Illuminate\Support\Facades\Auth;
use App\Models\Kegiatan;

class KegiatanFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = KegiatanFoto::paginate();
        return view('kegiatan-foto.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Kegiatan::all();
        return view('kegiatan-foto.create', compact('activities'));
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
            'id_kegiatan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'tanggal' => 'required',
        ]);

        $file = $request->file('foto');
        
        if ($file) {
            $filename = 'foto-' . time() . '.' . $file->getClientOriginalExtension();
            $image = $file->storeAs('public/foto', $filename);
        }

        $path = $image ?: null;

        $new = KegiatanFoto::create([
            'id_kegiatan' => $request->id_kegiatan,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
            'tanggal' => $request->tanggal,
            'id_user' => Auth::user()->id_user,
        ]);

        if ($new) {
            return redirect(route('kegiatan.show', $request->id_kegiatan))->with('success', 'Kegiatan berhasil ditambahkan!.');
        }else{
            return redirect()->back()->with('error', 'Foto gagal ditambahkan!.');
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
        $show = KegiatanFoto::findOrFail($id);
        $fotos = KegiatanFoto::where('id_kegiatan', '=', $id)->paginate();
        return view('kegiatan-foto.detail', compact('show', 'fotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = KegiatanFoto::findOrFail($id);
        $activities = Kegiatan::all();
        return view('kegiatan-foto.edit', compact('update', 'activities'));
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
            'id_kegiatan' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
        ]);

        $file = $request->file('foto');

        $update = KegiatanFoto::findOrFail($id);

        $path = $update->foto;
        
        if ($file) {
            $filename = 'foto-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/foto', $filename);
        }

        $data = $update->update([
            'id_kegiatan' => $request->id_kegiatan,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
            'tanggal' => $request->tanggal,
            'id_user' => Auth::user()->id_user,
        ]);

        if ($data) {
            return redirect(route('kegiatan.show', $request->id_kegiatan))->with('success', 'Kegiatan berhasil diperbaharui!.');
        }else{
            return redirect()->back()->with('error', 'Kegiatan gagal diperbaharui!.');
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
        $delete = KegiatanFoto::findOrFail($id);

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
