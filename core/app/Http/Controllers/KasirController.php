<?php

namespace App\Http\Controllers;

use App\Models\Detail_penjualan;
use App\Models\Obat;
use App\Models\Penjualan_Obat;
use App\Models\Satuan_Obat;
use App\Models\Temp_penjualan_obat;
use App\Models\Unit;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use DateTime;

class KasirController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::orderBy('nama_instansi','asc')->get();
        $data['pelanggan'] = $pelanggan;
        return view('back.pages.kasir.kasir',$data);
    }

    public function showObat(Request $request)
    {
        $obat = Obat::where('nama_obat','like','%' . $request->keyword . '%')->orWhere('kode_obat','like','%' . $request->keyword . '%')->with('satuans')->get();
        $data['obat'] = $obat;
        $data['html'] = view('back.pages.part_of.tabel_show_obat',$data)->render();
        if(count($obat) == 0){
            $data['kosong'] = 'kosong';
        }
        return response()->json($data);
    }

    public function addtolist(Request $request)
    {
        $user_id = auth()->user()->id;
        $obat = Obat::where('id',$request->id)->first();
        $cek = Temp_penjualan_obat::where('user_id',$user_id)->where('kode_obat',$obat->kode_obat)->count();
        if($cek > 0){
            return response()->json('ada');
        }else{
            $temp = new Temp_penjualan_obat();
            $temp->kode_obat = $obat->kode_obat;
            $temp->jumlah_obat = 0;
            $temp->unit_id = 0;
            $temp->harga = 0;
            $temp->diskon = 0;
            $temp->subtotal = 0;
            $temp->user_id = $user_id;
            $temp->save();

            return response()->json('ok');
        }
    }

    public function getList()
    {
        $user_id = auth()->user()->id;
        $list = Temp_penjualan_obat::where('user_id',$user_id)->get();
        $data['list'] = $list;
        return view('back.pages.part_of.tabel_list_obat',$data);
    }

    public function changePcs(Request $request)
    {
        $temp = Temp_penjualan_obat::where('id',$request->id)->first();
        $satuan = Satuan_Obat::where('kode_obat',$temp->kode_obat)->get();
        $data['temp'] = $temp;
        $data['satuan'] = $satuan;
        return view('back.pages.part_of.modal_pcs',$data);
    }

    public function changePcsPost(Request $request)
    {
        // dd($request->all());
        $temp = Temp_penjualan_obat::where('id',$request->id)->first();
        $harga = Satuan_Obat::where('kode_obat',$temp->kode_obat)->where('unit_id',$request->unit_id)->first();

        $temp->jumlah_obat = $request->jumlah_obat;
        $temp->unit_id = $request->unit_id;
        $temp->harga = $harga->harga_Jual;
        $temp->subtotal = ($harga->harga_Jual * $request->jumlah_obat)  - (($temp->diskon / 100) * ($harga->harga_Jual * $request->jumlah_obat));
        $temp->save();

        return redirect()->back();
    }

    public function changeDiskon(Request $request)
    {
        $temp = Temp_penjualan_obat::where('id',$request->id)->first();
        $data['temp'] = $temp;
        return view('back.pages.part_of.modal_diskon',$data);
    }

    public function changeDiskonPost(Request $request)
    {
        // dd($request->all());
        $temp = Temp_penjualan_obat::where('id',$request->id)->first();
        $subtotal  = $temp->subtotal;
        $nom_diskon = (int) (($request->diskon / 100) * $subtotal);
        $total  = $subtotal - $nom_diskon;
        $temp->diskon = $request->diskon;
        $temp->subtotal = $total;
        $temp->save();
        return redirect()->back();
    }

    public function getTotal()
    {
        $user_id = auth()->user()->id;
        $list = Temp_penjualan_obat::where('user_id',$user_id)->sum('subtotal');
        $list_obat = Temp_penjualan_obat::where('user_id',$user_id)->get();
        $pot_pen = 0;
        $total_1 = 0;
        foreach($list_obat as $item){
            $total_1 += $item->harga * $item->jumlah_obat;
            $pot_pen += (int) (($item->diskon /100) * ($item->harga * $item->jumlah_obat)); 
        }
        $data['total_1'] = $total_1;
        $data['pot_pen'] = $pot_pen;

        // dd($data);
        return response()->json($data);
    }

    public function store(Request $request){
        // dd($request->all());
        $user_id = auth()->user()->id;
        $penjualan = new Penjualan_Obat();
        $penjualan->no_transaksi = $request->kode_transaksi;
        $penjualan->tgl_transaksi = date('Y-m-d');
        $penjualan->pelanggan_id = $request->pelanggan_id;
        $penjualan->pot_pen = str_replace(".","",$request->pot_pen);
        $penjualan->jumlah_tagihan  = str_replace(".","",$request->jumlah_tagihan);
        $penjualan->uang_bayar  = str_replace(".","",$request->terbilang);
        // $penjualan->top = 0;
        // if($request->tgl_jatuh_tempo){
        //     $penjualan->is_kredit = 1;
        //     $penjualan->jatuh_tempo = date('Y-m-d',strtotime($request->tgl_jatuh_tempo));

        //     $tgl1 = new DateTime(date('Y-m-d'));
        //     $tgl2 = new DateTime($request->tgl_jatuh_tempo);
        //     $d = $tgl2->diff($tgl1)->days + 1;
        //     $penjualan->top = $d;
        //     // dd($d);
        // }
        
        $penjualan->uang_kembali = str_replace(".","",$request->uang_kembali);;
        $penjualan->user_id = $user_id;
        $penjualan->save();

        $temp = Temp_penjualan_obat::where("user_id",$user_id)->get();
        // dd($temp);
        foreach($temp as $item){
            $detail = new Detail_penjualan();
            $detail->kode_obat = $item->kode_obat;
            $detail->jumlah_obat = $item->jumlah_obat;
            $detail->no_transaksi = $penjualan->no_transaksi;
            $detail->unit_id = $item->unit_id;
            $detail->harga = $item->harga;
            $detail->diskon = $item->diskon;
            $detail->subtotal = $item->subtotal;
            $detail->user_id = $user_id;
            $detail->save();

            // $update_stok = Satuan_Obat::where('kode_obat',$detail->kode_obat)->where('unit_id',$detail->unit_id)->first();
            // $update_stok->stok = ($update_stok->stok - $item->jumlah_obat);
            // $update_stok->save();

            $update_stok1 = Satuan_Obat::where('kode_obat',$item->kode_obat)->where('unit_id',$item->unit_id)->first();
            $update_stok1->stok = ($update_stok1->stok - $item->jumlah_obat);
            $update_stok1->save();

            $update_stok = Satuan_Obat::where('kode_obat',$item->kode_obat)->where('unit_id',$item->unit_id)->first();
            $satuan_atas = Unit::select('unit.id','satuan_obat.stok','satuan_obat.kode_obat','unit.tingkat_satuan','satuan_obat.id as id_satuan')->where('tingkat_satuan','>=',$update_stok->unit->tingkat_satuan)->join('satuan_obat','unit.id','=','satuan_obat.unit_id')->where('kode_obat',$item->kode_obat)->orderBy('tingkat_satuan','asc');
            $satuan_bawah = Unit::select('unit.id','satuan_obat.stok','satuan_obat.kode_obat','unit.tingkat_satuan','satuan_obat.id as id_satuan')->where('tingkat_satuan','<=',$update_stok->unit->tingkat_satuan)->join('satuan_obat','unit.id','=','satuan_obat.unit_id')->where('kode_obat',$item->kode_obat)->orderBy('tingkat_satuan','DESC');
            $cek_atas = count($satuan_atas->get());
            $cek_bawah = count($satuan_bawah->get());
            
            if($cek_bawah > 0){
                foreach($satuan_bawah->get() as $key => $ca){
                    if($ca->id_satuan !=  $update_stok1->id){
                        $bawah = Satuan_Obat::where('unit_id',$ca->id)->where('id','!=',$update_stok1->id)->where('kode_obat',$item->kode_obat)->first();
                        $get_parent = Satuan_Obat::where('id',$bawah->sama_dengan)->first();  
                        $bawah->stok = ($get_parent->jumlah_satuan * $get_parent->stok);
                        $bawah->save(); 
                    }
                       
                }
            }
            
            if($cek_atas > 0){
                foreach($satuan_atas->get() as $key => $cas){
                    if($cas->id_satuan !=  $update_stok1->id){
                        $atas = Satuan_Obat::where('unit_id',$cas->id)->where('id','!=',$update_stok1->id)->where('kode_obat',$item->kode_obat)->first();
                        $get_parent_atas = Satuan_Obat::where('unit_id',$atas->unit_id_sama_dengan)->first();  
                        $atas->stok = ($get_parent_atas->stok / $atas->jumlah_satuan );
                        $atas->save(); 
                    }
                       
                }
            }       
        }

        

        $dele = Temp_penjualan_obat::where('user_id',$user_id)->delete();
        return redirect()->back()->with('success','Transaksi Berhasil di simpan');
        
    }

    public function listDestroy(Request $request){
        $dele = Temp_penjualan_obat::where('id',$request->id)->delete();
        return response()->json();
    }
}
