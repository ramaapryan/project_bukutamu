<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BukuTamu;

class BukuTamuController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index(){
        $kunjungan = DB::table('kunjungan')->get();

    	return view('index',['kunjungan' => $kunjungan]);
    }

    public function edit ($id){
        $kunjungan = DB::table('kunjungan')->where('id',$id)->get();
        return view('edit',['kunjungan' => $kunjungan]);
    }

    // update data pegawai
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_berkunjung' => 'required|date',
            'kepentingan' => 'required',
            'tujuan' => 'required|in:kadin,sekdin,kasubag',
        ]);
    
        $data = BukuTamu::findOrFail($id);
        $data->nama = $validatedData['nama'];
        $data->alamat = $validatedData['alamat'];
        $data->tgl_berkunjung = $validatedData['tgl_berkunjung'];
        $data->kepentingan = $validatedData['kepentingan'];
        $data->tujuan = $validatedData['tujuan'];
        $data->save();
        return redirect('/dataTamu');
    }
    
	public function hapus($id)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('kunjungan')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/dataTamu');
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
