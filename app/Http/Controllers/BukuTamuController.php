<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTamu;

class BukuTamuController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_berkunjung' => 'required|date',
            'kepentingan' => 'required',
            'tujuan' => 'required|in:kadin,sekdin,kasubag',
        ]);

        BukuTamu::create($validatedData);

        return redirect('/')->with('success', 'Data sudah disubmit.');
    }
}
