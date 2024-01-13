<?php

namespace App\Http\Controllers;

use App\Models\truk;
use Illuminate\Http\Request;

class TrukController extends Controller
{
    public function index()
    {
        // Tampilkan semua truk
        $truks = Truk::all();

        return view('admin.truk.index', compact('truks'));
    }

    public function create()
    {
        // Tampilkan formulir tambah truk
        return view('admin.truk.create');
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
        Truk::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('admin.truk.index')->with('success', 'Truk berhasil ditambahkan');
    }

    public function show($id)
    {
        // Tampilkan detail truk berdasarkan ID
        $truk = Truk::find($id);

        return view('admin.truk.show', compact('truk'));
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
        return redirect()->route('admin.truk.index')->with('success', 'Truk berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus truk berdasarkan ID
        Truk::destroy($id);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.truk.index')->with('success', 'Truk berhasil dihapus');
    }
}
