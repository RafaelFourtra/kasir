<?php

namespace App\Exports;

use App\Models\TransaksiPo;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\OrderPo;

class LaporanBulananPoExport implements FromView
{
    public $lbp;
   

    public function __construct($lapbupo)
    {
        $this->lbp = $lapbupo;
    }
    public function view(): View
    {
    
            
        return view('laporan.reportsbulananpo', $this->lbp);
    }

}