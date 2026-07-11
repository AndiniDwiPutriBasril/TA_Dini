<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    // halaman akun
    public function index()
    {
        return view('akun');
    }

    // update akun
    public function update(Request $request)
    {
        $user = auth()->user();

        // update nama
        $user->name = $request->name;

        // update email
        $user->email = $request->email;

        // update password
        if ($request->password)
        {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Akun berhasil diperbarui');
    }
}