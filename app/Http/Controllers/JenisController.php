<?php

namespace App\Http\Controllers;

use App\Models\jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        // Tampilkan semua jenis
        $jeniss = Jenis::all();

        return view('admin.jenis.index', compact('jeniss'));
    }

    public function create()
    {
        // Tampilkan formulir tambah jenis
        return view('admin.jenis.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_kelompok' => 'required',
            'deskripsi' => 'required',
        ]);

        // Simpan data ke dalam database
        Jenis::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis.index')->with('success', 'Jenis berhasil ditambahkan');
    }

    public function show($id)
    {
        // Tampilkan detail jenis berdasarkan ID
        $jenis = Jenis::find($id);

        return view('admin.jenis.show', compact('jenis'));
    }

    public function edit($id)
    {
        // Tampilkan formulir edit jenis berdasarkan ID
        $jenis = Jenis::find($id);

        return view('admin.jenis.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama_kelompok' => 'required',
            'deskripsi' => 'required',
        ]);

        // Update data jenis berdasarkan ID
        Jenis::where('id', $id)->update($request->except('_token', '_method'));

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis.index')->with('success', 'Jenis berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus jenis berdasarkan ID
        Jenis::destroy($id);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis.index')->with('success', 'Jenis berhasil dihapus');
    }
}
