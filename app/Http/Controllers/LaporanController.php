<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\TransaksiPo;
use App\Models\Order_Detail_Po;
use Excel;
use App\Exports\LaporanExport;
use App\Exports\LaporanPiutangExport;
use App\Exports\LaporanPiutangPoExport;
use App\Exports\LaporanPoExport;
use App\Exports\LaporanBulananExport;
use App\Exports\LaporanBulananPoExport;
use App\Exports\LaporanJadwalPoExport;

class LaporanController extends Controller
{
    public function index(Request $req) 
    {
        $data = Transaksi::all();
        if($req->filled('datefrom')){
            $datefrom = $req->datefrom;
            $dateto = $req->dateto;
            $data
            ->whereBetween('transaksi_date',[$datefrom,$dateto])
            ->orWhere('transaksi_date', $datefrom)
            ->orWhere('transaksi_date', $dateto);
            return view('laporan.index',["data" => $data, 'datefrom' => $datefrom , 'dateto' => $dateto]);
        }
        return view('laporan.index',["data" => $data]);
    }

    public function piutang(Request $req) 
    {
        $datapiu = Transaksi::all();
        if($req->filled('datefrom')){
            $datefrom = $req->datefrom;
            $dateto = $req->dateto;
            $datapiu
            ->whereBetween('transaksi_date',[$datefrom,$dateto])
            ->orWhere('transaksi_date', $datefrom)
            ->orWhere('transaksi_date', $dateto);
            return view('laporan.piutang',["datapiu" => $datapiu->get(), 'datefrom' => $datefrom , 'dateto' => $dateto]);
        }
        return view('laporan.piutang',["datapiu" => $datapiu->get()]);
    }


    public function getBulanan($start,$end){
        $data = Transaksi::all();

        $datanewstructure = [];
       
        $olddata;
        if($start !== "-" and $end !== "-"){
            $datefrom = $start;
            $dateto = $end;
            $data
            ->whereBetween('transaksi_date',[$datefrom,$dateto])
            ->orWhere('transaksi_date', $datefrom)
            ->orWhere('transaksi_date', $dateto);
          
        }

        $data = $data->groupBy("transaksi_date")->get();
        //mengisi data struktur yg baru

        foreach($data as $i => $dato){
            $datanewstructure[$i]["tanggal"] = $dato->transaksi_date;
            $datanewstructure[$i]["cash"] = Transaksi::where("transaksi_date",$dato->transaksi_date)->where("payment_method", "Cash")->sum("transaksi_jumlah") > 0 ? Transaksi::where("transaksi_date",$dato->transaksi_date)->where("payment_method", "Cash")->sum("transaksi_jumlah") : null;
            $datanewstructure[$i]["bank"] = Transaksi::where("transaksi_date",$dato->transaksi_date)->where("payment_method", "Debit")->sum("transaksi_jumlah") > 0 ? Transaksi::where("transaksi_date",$dato->transaksi_date)->where("payment_method", "Debit")->sum("transaksi_jumlah"): null;
            $datanewstructure[$i]["total"] = Transaksi::where("transaksi_date",$dato->transaksi_date)->whereNotIn("payment_method" ,['Piutang', 'cancel'])->sum("transaksi_jumlah");
        }

        $arrayr = ["data" => $datanewstructure];
        $arrayr["datefrom"] = $start;
        $arrayr["dateto"] = $end;

       return $arrayr;
    }
    
    public function bulanan(Request $req) 
    {
        $datefrom = "-";
        $dateto = "-";
        if($req->filled("datefrom") and  $req->filled("dateto")){
            $datefrom = $req-> datefrom == '-' ? null : $req-> datefrom;
            $dateto = $req-> dateto == '-' ? null : $req-> dateto;
        }
       
        $arrayr = $this->getBulanan($datefrom,$dateto);
        

     
        return view('laporan.bulanan',$arrayr);
    }

    public function po(Request $req) 
    {
        $data = TransaksiPo::with('orderdetailpo');
        if($req->filled('datefrom')){
            $datefrom = $req->datefrom;
            $dateto = $req->dateto;
            $data
            ->whereBetween('transaksi_date',[$datefrom,$dateto])
            ->orWhere('transaksi_date', $datefrom)
            ->orWhere('transaksi_date', $dateto);
            return view('laporan.po',["data" => $data->get(), 'datefrom' => $datefrom , 'dateto' => $dateto]);
        }
      //  dd($data->get());
        return view('laporan.po',["data" => $data->get()]);
    }

    public function getBulananPo($start,$end){
        $data = TransaksiPo::all();

        $datanewstructure = [];
       
        $olddata;
        if($start !== "-" and $end !== "-"){
            $datefrom = $start;
            $dateto = $end;
            $data
            ->whereBetween('transaksi_date',[$datefrom,$dateto])
            ->orWhere('transaksi_date', $datefrom)
            ->orWhere('transaksi_date', $dateto);
          
        }

        $data = $data->groupBy("transaksi_date")->get();
        //mengisi data struktur yg baru

        foreach($data as $i => $dato){

            $datanewstructure[$i]["tanggal"] = $dato->transaksi_date;
            $datanewstructure[$i]["cash"] = TransaksiPo::where("transaksi_date",$dato->transaksi_date)->where("payment_method", "Cash")->sum("transaksi_jumlah") > 0 ? TransaksiPo::where("transaksi_date",$dato->transaksi_date)->where("payment_method", "Cash")->sum("transaksi_jumlah") : null;
            $datanewstructure[$i]["bank"] = TransaksiPo::where("transaksi_date",$dato->transaksi_date)->where("payment_method", "Debit")->sum("transaksi_jumlah") > 0 ? TransaksiPo::where("transaksi_date",$dato->transaksi_date)->where("payment_method", "Debit")->sum("transaksi_jumlah"): null;
            $datanewstructure[$i]["total"] = TransaksiPo::where("transaksi_date",$dato->transaksi_date)->whereNotIn("payment_method" ,['Piutang', 'cancel'])->sum("transaksi_jumlah");
        
        }

        $arrayr = ["data" => $datanewstructure];
        $arrayr["datefrom"] = $start;
        $arrayr["dateto"] = $end;

       return $arrayr;
    }

    public function bulananpo(Request $req) 
    {
        $datefrom = "-";
        $dateto = "-";
        if($req->filled("datefrom") and  $req->filled("dateto")){
            $datefrom = $req-> datefrom == '-' ? null : $req-> datefrom;
            $dateto = $req-> dateto == '-' ? null : $req-> dateto;
        }
       
        $arrayr = $this->getBulananPo($datefrom,$dateto);
        

     
        return view('laporan.bulananpo',$arrayr);
    }
    
    public function piutangpo(Request $req) 
    {
        $data = TransaksiPo::all();
        if($req->filled('datefrom')){
            $datefrom = $req->datefrom;
            $dateto = $req->dateto;
            $data
            ->whereBetween('transaksi_date',[$datefrom,$dateto])
            ->orWhere('transaksi_date', $datefrom)
            ->orWhere('transaksi_date', $dateto);
            return view('laporan.piutangpo',["data" => $data->get(), 'datefrom' => $datefrom , 'dateto' => $dateto]);
        }
        return view('laporan.piutangpo',["data" => $data->get()]);
    }

    public function jadwalpo(Request $req) 
    {
        $data = TransaksiPo::with('orderdetailpo');
        if($req->filled('datefrom')){
            $datefrom = $req->datefrom;
            $dateto = $req->dateto;
            $data
            ->whereBetween('transaksi_date',[$datefrom,$dateto])
            ->orWhere('transaksi_date', $datefrom)
            ->orWhere('transaksi_date', $dateto);
            return view('laporan.jadwalpo',["data" => $data->get(), 'datefrom' => $datefrom , 'dateto' => $dateto]);
        }
      //  dd($data->get());
        return view('laporan.jadwalpo',["data" => $data->get()]);
    }

    public function export(Request $req)
    {
        $datefrom = $req-> datefrom == '-' ? null : $req-> datefrom;
        $dateto = $req-> dateto == '-' ? null : $req-> dateto;
        
        return Excel::download(new LaporanExport($datefrom,$dateto),"Laporan Income Harian.xls");
    }
    public function exportpiutang(Request $req)
    {
        $datefrom = $req-> datefrom == '-' ? null : $req-> datefrom;
        $dateto = $req-> dateto == '-' ? null : $req-> dateto;
        
        return Excel::download(new LaporanPiutangExport($datefrom,$dateto),"Laporan Piutang.xls");
    }
    public function exportbulanan(Request $req)
    {
        $datefrom = $req-> datefrom;
        $dateto = $req->dateto;

        $laporanBulanan = $this->getBulanan($datefrom,$dateto);

        //dd($laporanBulanan);
        
        return Excel::download(new LaporanBulananExport($laporanBulanan),"Laporan Bulanan.xls");
    }
    public function exportpo(Request $req){
        $datefrom = $req-> datefrom == '-' ? null : $req-> datefrom;
        $dateto = $req-> dateto == '-' ? null : $req-> dateto;
        
        return Excel::download(new LaporanPoExport($datefrom,$dateto),"Laporan Harian Cathering.xls");
        }
    public function exportbulananpo(Request $req)
    {
        $datefrom = $req-> datefrom;
        $dateto = $req->dateto;
    
        $laporanBulananPo = $this->getBulananPo($datefrom,$dateto);
    
        //dd($laporanBulanan);
            
        return Excel::download(new LaporanBulananPoExport($laporanBulananPo),"Laporan Bulanan Cathering.xls");
    }
    public function exportpiutangpo(Request $req)
    {
        $datefrom = $req-> datefrom == '-' ? null : $req-> datefrom;
        $dateto = $req-> dateto == '-' ? null : $req-> dateto;
        
        return Excel::download(new LaporanPiutangPoExport($datefrom,$dateto),"Laporan Piutang Cathering.xls");
    }
    public function exportjadwalpo(Request $req)
    {
        $datefrom = $req-> datefrom == '-' ? null : $req-> datefrom;
        $dateto = $req-> dateto == '-' ? null : $req-> dateto;
        
        return Excel::download(new LaporanJadwalPoExport($datefrom,$dateto),"Laporan Jadwal Cathering.xls");
    }
}
