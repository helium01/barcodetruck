<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permintaan;
use App\Models\truk;

class PermintaanController extends Controller
{
    public function index()
    {
        // Tampilkan semua permintaan
        $permintaans = Permintaan::all();

        return view('admin.permintaan.index', compact('permintaans'));
    }
    public function indexqrcode($id)
    {
        // Tampilkan semua jenis
        $permintaan = permintaan::find($id);
        // dd($permintaan);
        return view('admin.permintaan.qrcode', compact('permintaan'));
    }
    public function accpermintaan($id)
    {
        // Tampilkan semua jenis
        $permintaan = permintaan::find($id)->update('status',);
        // dd($permintaan);
        return view('admin.permintaan.qrcode', compact('permintaan'));
    }
    public function indexclient()
    {
        $unit=truk::all();
        // Tampilkan semua permintaan
        $permintaans = Permintaan::all();

        return view('client.permintaan', compact('permintaans','unit'));
    }
    public function riwayatclient()
    {
        // Tampilkan semua permintaan
        $permintaans = Permintaan::all();

        return view('client.riwayat', compact('permintaans'));
    }

    public function create()
    {
        // Tampilkan formulir tambah permintaan
        return view('admin.permintaan.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'tanggal' => 'required|date',
            'kode_unit' => 'required',
            'afdeling' => 'required',
            'km_awal' => 'required|numeric',
            'km_akhir' => 'required|numeric',
            'selisih' => 'required|numeric',
            'rasio' => 'required|numeric',
        ]);

        // Simpan data ke dalam database
        Permintaan::create($request->all());

        // Redirect dengan pesan sukses
        return redirect('/client/riwayat')->with('success', 'Permintaan berhasil ditambahkan');
    }

    public function show($id)
    {
        // Tampilkan detail permintaan berdasarkan ID
        $permintaan = Permintaan::find($id);

        return view('admin.permintaan.show', compact('permintaan'));
    }

    public function edit($id)
    {
        // Tampilkan formulir edit permintaan berdasarkan ID
        $permintaan = Permintaan::find($id);

        return view('admin.permintaan.edit', compact('permintaan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'tanggal' => 'required|date',
            'kode_unit' => 'required',
            'afdeling' => 'required',
            'km_awal' => 'required|numeric',
            'km_akhir' => 'required|numeric',
            'selisih' => 'required|numeric',
            'rasio' => 'required|numeric',
        ]);

        // Update data permintaan berdasarkan ID
        Permintaan::where('id', $id)->update($request->except('_token', '_method'));

        // Redirect dengan pesan sukses
        return redirect('/client/riwayat')->with('success', 'Permintaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus permintaan berdasarkan ID
        Permintaan::destroy($id);

        // Redirect dengan pesan sukses
        return redirect('/client/riwayat')->with('success', 'Permintaan berhasil dihapus');
    }
}
