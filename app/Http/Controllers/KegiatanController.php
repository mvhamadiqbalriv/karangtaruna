<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\KegiatanFoto;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Kegiatan::paginate();
        return view('kegiatan.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatan.create');
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
            'kegiatan' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'sasaran' => 'required',
            'keterangan' => 'required',
        ]);

        $new = Kegiatan::create([
            'kegiatan' => $request->kegiatan,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'sasaran' => $request->sasaran,
            'keterangan' => $request->keterangan,
        ]);

        if ($new) {
            return redirect(url('kegiatan'))->with('success', 'Kegiatan berhasil ditambahkan!.');
        }else{
            return redirect()->back()->with('error', 'Kegiatan gagal ditambahkan!.');
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
        $show = Kegiatan::findOrFail($id);
        $fotos = KegiatanFoto::where('id_kegiatan', '=', $id)->paginate();
        return view('kegiatan.detail', compact('show', 'fotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('update'));
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
            'kegiatan' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'sasaran' => 'required',
            'keterangan' => 'required',
        ]);

        $update = Kegiatan::findOrFail($id);

        $data = $update->update([
            'kegiatan' => $request->kegiatan,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'sasaran' => $request->sasaran,
            'keterangan' => $request->tempat,
        ]);

        if ($data) {
            return redirect(url('kegiatan'))->with('success', 'Kegiatan berhasil diperbaharui!.');
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
        $delete = Kegiatan::findOrFail($id);

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
