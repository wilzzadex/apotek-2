<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        $suplier = Suplier::orderBy('id','DESC')->get();
        $data['suplier'] = $suplier;
        return view('back.pages.suplier.suplier',$data);
    }

    public function add()
    {
        return view('back.pages.suplier.suplier_add');
    }

    public function store(Request $request)
    {
       $suplier = new Suplier();
       $suplier->nama_suplier = $request->nama;
       $suplier->alamat = $request->alamat;
       $suplier->penanggung_jawab = $request->p_jawab;
       $suplier->no_telp = $request->no_telp;
       $suplier->save();

       return redirect(route('suplier'))->with('success','Data Berhasil di Simpan !');
    }

    public function edit($id)
    {
        $data['suplier'] = Suplier::findOrFail($id);
        return view('back.pages.suplier.suplier_edit',$data);
    }

    public function update(Request $request,$id)
    {
        $suplier = Suplier::findOrFail($id);
        $suplier->nama_suplier = $request->nama;
        $suplier->alamat = $request->alamat;
        $suplier->penanggung_jawab = $request->p_jawab;
        $suplier->no_telp = $request->no_telp;
        $suplier->save();

        return redirect(route('suplier'))->with('success','Data Berhasil di Ubah !');
    }

    public function destroy(Request $request)
    {
        $suplier = Suplier::findOrFail($request->id);

        $cek = Pembelian::where('suplier_id',$suplier->id)->count();

        if($cek == 0){
            $suplier->delete();
        }

        return response()->json($cek);
    }
}
