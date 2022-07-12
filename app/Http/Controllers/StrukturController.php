<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;

class StrukturController extends Controller
{
    public function show()
    {
        $data = Struktur::first();
        return view('struktur.index', compact('data'));
    }

    public function update(Request $request)
    {

        $data = Struktur::first();
        $file = $request->file('foto');
        $path = $data->foto;

        if ($file) {
            $filename = 'foto-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/foto', $filename);
        }

        $data->update([
            'foto' => $path
        ]);

        return redirect()->back()->with('success', 'Struktur Organiasi updated.');
    }
}
