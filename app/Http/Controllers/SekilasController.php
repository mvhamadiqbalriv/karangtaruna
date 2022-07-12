<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Tentang;
use Illuminate\Support\Facades\Auth;

class SekilasController extends Controller
{
    public function show()
    {
        $data = Tentang::first();
        return view('sekilas.index', compact('data'));
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'nama_karta' => 'required',
            'deskripsi' => 'required'
        ]);

        $data = Tentang::first();

        $file = $request->file('logo');
        
        $path = $data->logo;

        if ($file) {
            $filename = 'logo-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/logo', $filename);
        }

        $data->update([
            'nama_karta' => $request->nama_karta,
            'deskripsi' => $request->deskripsi,
            'logo' => $path
        ]);

        return redirect()->back()->with('success', 'Sekilas Organiasi updated.');
    }
}
