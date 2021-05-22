

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
</head>
<body onload="window.print()">

<br>
<br>
<br>

{{ $set->nama_aplikasi }} <br>
{{ $set->alamat_aplikasi }} <br>
{{ $set->no_telp }} <br>
================================
<br>
Kode : {{ $form['no_transaksi'] }} <br>
Tanggal : {{ date('d M Y H:i') }} <br>
Kasir : {{ auth()->user()->name }} <br>
Pelanggan : {{ $pelanggan->nama_instansi }} <br>
--------------------------------
<br>
@foreach ($penjualan as $key => $item)
{{ $item->kode_obat }} - {{ $item->obat->nama_obat }} <br>
{{ $item->jumlah_obat }} x {{ number_format($item->harga) }} / {{ $item->unit->nama }}  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
{{-- {{ $item->diskon != 0 ? $item->diskon . '%' : '0%' }} --}}

{{-- {{ number_format(($item->diskon / 100) * $item->harga) }} --}}
{{ number_format($item->subtotal) }}

<br>
@endforeach
-------------------------------- <br>
Total :        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Rp. {{ $form['total_bayar'] }} <br>
Pot. Harga :   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Rp. {{ $form['pot_harga'] }} <br>
Uang Bayar :   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Rp. {{ $form['uang_bayar'] }} <br>
Kembali :      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Rp. {{ $form['uang_kembali'] }} <br>
<br>
-------------------------------- <br>
<br>
Terima Kasih <br>
================================ <br>
<br>
<br>
<br>
- <br>
</body>
</html>
    

