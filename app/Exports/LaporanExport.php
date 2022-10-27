<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Order;

class LaporanExport implements FromView
{
    public $datefrom;
    public $dateto;

    public function __construct($datefrom, $dateto)
    {
        $this->datefrom = $datefrom;
        $this->dateto = $dateto;
    }
    public function view(): View
    {
        $data = Transaksi::whereBetween('transaksi_date',[$this->datefrom,$this->dateto])
            ->orWhere('transaksi_date', $this->datefrom)
            ->orWhere('transaksi_date', $this->dateto);
            
        return view('laporan.reportspenjualan', ["data" => $data->get()]);
    }

}
