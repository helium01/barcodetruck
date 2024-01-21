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
    public function accpermintaan(Request $request,$id)
    {
        // Tampilkan semua jenis
        // dd($id);
        $permintaan = permintaan::where('kode_unit',$id)->where('status','pending')->update(['status'=>'acc','km_awal_gudang'=>$request->km_awal,'km_akhir_gudang'=>$request->km_akhir_gudang,'selisih_gudang'=>$request->selisih]);
        // $permintaan = permintaan::find($id);
        // dd($permintaan);
        return redirect('/admin/permintaan');
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
        // dd($request);
        // Validasi data input
        $request->validate([
            'tanggal' => 'required|date',
            'kode_unit' => 'required',
            'afdeling' => 'required',
            'km_awal' => 'required|numeric',
            'km_akhir' => 'required|numeric',
            'selisih' => 'required|numeric',
            'rasio' => 'required',
        ]);
        $data=permintaan::where('kode_unit',$request->kode_unit)->where('status','pending')->count();
        if($data>0){
            // dd($data);
            return redirect()->back();
        }
        // Simpan data ke dalam database
        Permintaan::create($request->all());

        // Redirect dengan pesan sukses
        return redirect('/client/riwayat')->with('success', 'Permintaan berhasil ditambahkan');
    }

    // public function show($id)
    // {
    //     dd('sini');
    //     // Tampilkan detail permintaan berdasarkan ID
    //     $permintaan = Permintaan::find($id);

    //     return view('admin.permintaan.show', compact('permintaan'));
    // }
    public function permintaan(Request $request)
    {
        // dd($request->kodeUnit);
        $data=permintaan::join('truks','truks.id','=','permintaans.kode_unit')->join('jenis','jenis.id','=','truks.id_jenis')->where('kode_unit',$request->kodeUnit)->where('status','pending')->get();
        // dd($data);
        // Tampilkan detail permintaan berdasarkan ID
        // $permintaan = Permintaan::find($id);
        if($data->count()<=0){
            // dd('ok');
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('admin.bensin.index',compact('data'));
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
