<?php
namespace App\Exports;

use App\Models\Penjualan_Obat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenjualanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping, WithStyles
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     // varible form and to 
     public function __construct(String $tanggal_awal = null , String $tanggal_akhir = null,String $kasir_id = null)
     {
         $this->tanggal_awal = $tanggal_awal;
         $this->tanggal_akhir = $tanggal_akhir;
         $this->kasir_id   = $kasir_id;
     }
     
     //function select data from database 
     public function collection()
     {
         return Penjualan_Obat::where('user_id',$this->kasir_id)->whereBetween('tgl_transaksi',[$this->tanggal_awal,$this->tanggal_akhir])->get();
 
     }
     /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
               
            },
        ];
    }

    public function map($penjualan): array
    {
        
        return [
            $penjualan->no_transaksi,
            $penjualan->tgl_transaksi,
            $penjualan->jumlah_bayar,
            $penjualan->user->name,
        ];
    }

     //function header in excel
     public function headings(): array
     {
         return [
             'No Transaksi',
             'Tanggal Transaksi',
             'Total',
             'Kasir',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('C1')->getFont()->setBold(true);
        $sheet->getStyle('D1')->getFont()->setBold(true);
        $sheet->getStyle('E1')->getFont()->setBold(true);
        $sheet->getStyle('F1')->getFont()->setBold(true);
        // $sheet->setAllBorders('thin');
    }
}
