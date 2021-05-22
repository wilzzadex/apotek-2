<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use App\Models\Penjualan_Obat;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::where('id','!=',1)->orderBy('nama_instansi','asc')->get();
        $data['pelanggan'] = $pelanggan;
        return view('back.pages.pelanggan.pelanggan',$data);
    }

    public function add()
    {
        return view('back.pages.pelanggan.pelanggan_add');
    }

    public function store(Request $request)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->nama_instansi = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->penanggung_jawab = $request->p_jawab;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->save();

        return redirect(route('pelanggan'))->with('success','Data berhasil di simpan');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $data['pelanggan'] = $pelanggan;
        return view('back.pages.pelanggan.pelanggan_edit',$data);
    }

    public function update(Request $request,$id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->nama_instansi = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->penanggung_jawab = $request->p_jawab;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->save();

        return redirect()->back()->with('success','Data berhasil di ubag');
    }

    public function destroy(Request $request)
    {
        $pelanggan = Pelanggan::findOrFail($request->id);
        $cek = Penjualan_Obat::where('pelanggan_id',$pelanggan->id)->count();
        if($cek == 0){
            $pelanggan->delete();
        }
        return response()->json($cek);
    }
}
