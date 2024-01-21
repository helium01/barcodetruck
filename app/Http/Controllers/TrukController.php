<?php

namespace App\Http\Controllers;

use App\Models\truk;
use App\Models\jenis;
use Illuminate\Http\Request;

class TrukController extends Controller
{
    public function index()
    {
        // Tampilkan semua truk
        $truks = Truk::join('jenis','jenis.id','=','truks.id_jenis')->select('jenis.nama_kelompok','truks.*')->get();
        // dd($truks);
        return view('admin.truk.index', compact('truks'));
    }
    public function indexqrcode($id)
    {
        // Tampilkan semua jenis
        $jeniss = truk::join('jenis','jenis.id','=','truks.id_jenis')->where('jenis.id',$id)->get();
        // dd($jeniss);
        return view('admin.truk.qrcode', compact('jeniss'));
    }


    public function create()
    {
        $jenis=jenis::all();
        // Tampilkan formulir tambah truk
        return view('admin.truk.create',compact('jenis'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'id_jenis' => 'required',
            'nama_unit' => 'required',
            'deskripsi' => 'required',
        ]);

        // Simpan data ke dalam database
        $data=Truk::where('nama_unit',$request->nama_unit)->count();
        if($data>0){
            return redirect()->back();
        }
        Truk::create($request->all());

        // Redirect dengan pesan sukses
        return redirect('/admin/truk')->with('success', 'Truk berhasil ditambahkan');
    }

    public function show($id)
    {
        // Tampilkan detail truk berdasarkan ID
        $truk = Truk::find($id);

        return view('admin.truk.edit', compact('truk'));
    }

    public function edit($id)
    {
        // Tampilkan formulir edit truk berdasarkan ID
        $truk = Truk::find($id);

        return view('admin.truk.edit', compact('truk'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'id_jenis' => 'required',
            'nama_unit' => 'required',
            'deskripsi' => 'required',
        ]);

        // Update data truk berdasarkan ID
        Truk::where('id', $id)->update($request->except('_token', '_method'));

        // Redirect dengan pesan sukses
        return redirect('/admin/truk')->with('success', 'Truk berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus truk berdasarkan ID
        Truk::destroy($id);

        // Redirect dengan pesan sukses
        return redirect('/admin/truk')->with('success', 'Truk berhasil dihapus');
    }
}
