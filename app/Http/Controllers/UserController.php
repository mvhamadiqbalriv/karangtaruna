<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id_user', '!=', Auth::user()->id_user)
                        ->paginate();
        $levels = Level::all();

        return view('users.index', compact('users', 'levels'));
    }

    public function detail($id)
    {
        $users = User::find($id);

        return response()->json([
            'data' => $users ?: null,
            'status' => $users ? 'success' : 'error'
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'username' => 'required|max:255|string|unique:users',
            'email' => 'required|max:255|string|unique:users',
            'password' => 'required|min:6|string|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors() ?: null,
                'status' => $validator->errors() ? 'error' : 'success'
            ]);
        }else{
            $new = User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'email' => $request->email,
                'id_level' => $request->id_level,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'data' => $new ?: null,
                'status' => $new ? 'success' : 'error'
            ]);
        }
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'username' => 'required|max:255|string|unique:users,username,'.$id.',id_user',
            'email' => 'required|max:255|string|unique:users,email,'.$id.',id_user',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors() ?: null,
                'status' => $validator->errors() ? 'error' : 'success'
            ]);
        }else{
            $data = User::findOrFail($id);

            $data->update([
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'email' => $request->email,
                'id_level' => $request->id_level,
            ]);

            return response()->json([
                'data' => $data ?: null,
                'status' => $data ? 'success' : 'error'
            ]);
        }
    }

    public function password($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|string|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors() ?: null,
                'status' => $validator->errors() ? 'error' : 'success'
            ]);
        }else{
            $data = User::findOrFail($id);

            $data->update([
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'data' => $data ?: null,
                'status' => $data ? 'success' : 'error'
            ]);
        }
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);

        if ($data) {
            $data->delete();
    
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
