<?php

namespace App\Http\Controllers;
use App\Models\Penjualan_Obat;
use Illuminate\Http\Request;

class BackDashboardController extends Controller
{
    public function index()
    {
        return view('back.pages.dashboard.dashboard');
    }

    public function grafikObat(Request $request)
    {

        $input = $request->tanggal;
        $pecah = explode(" - ",$input);
        $tanggal_awal = date('Y-m-d',strtotime($pecah[0]));
        $tanggal_akhir = date('Y-m-d',strtotime($pecah[1]));
        $obat = Penjualan_Obat::selectRaw('SUM(jumlah_tagihan) as total,DATE_FORMAT(tgl_transaksi, "%d %M %Y") as tgl_transaksi')->groupBy('tgl_transaksi')->whereBetween('tgl_transaksi',[$tanggal_awal,$tanggal_akhir])->take(7)->get();
        $data['grafik_obat'] = $obat;
        return response()->json($data);
        // dd($data);
    }
}
