<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RiwayatPenjualanController;
use App\Http\Controllers\RiwayatPenjualanPoController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjualanPoController;
use App\Http\Controllers\UserOrder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');
    Route::get('/logout',[DashboardController::class, 'Logout'])->name('logout');
    
});

Route::group(['middleware' => ['auth']], function(){

    Route::view("tambah","userOrder.tambah_menu");
    Route::view("tampil","userOrder.lihat_menu");
    Route::view("riwayat","userOrder.riwayat_user");
    
    Route::post("tambah",[UserOrder::class,"tambah"]);
    Route::get("tambah",[UserOrder::class,"tampil"]);
    Route::get('edit-po/{id}',[UserOrder::class,"edit"]);
    Route::put("tambah",[UserOrder::class,"update"]);
    Route::get("tambah/{id}",[UserOrder::class,"hapus"]);

    Route::get("tampil",[UserOrder::class,"lihat_menu"]);
    Route::post("tampil",[UserOrder::class,"riwayat_order"]);

    Route::get("riwayat/{id}",[UserOrder::class,"detail"]);
    Route::get("riwayat/",[UserOrder::class,"lihats"]);

    Route::get("riwayat/{id}",[UserOrder::class,"hapus_data"]);

    Route::get('/user', [UserController::class, 'Index'])->name('user');

    Route::resource('/kategori', KategoriController::class);
    Route::get('/editkategori/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/updatekategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/deletekategori/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

    Route::resource('/produk', ProdukController::class);
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');


    Route::post('/store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::resource('/penjualan', PenjualanController::class);
    Route::post('/searchitem', [PenjualanController::class, 'search']);

    Route::resource("/riwayatpenjualan",RiwayatPenjualanController::class);
    Route::get('/detailriwayat/{id}', [RiwayatPenjualanController::class, 'show'])->name('riwayatpenjualan.show');
    Route::get('/edittrans/{id}', [RiwayatPenjualanController::class, 'edit']);
    Route::post('/updatetrans/{id}', [RiwayatPenjualanController::class, 'update']);
    Route::get('/searchfromdate', [RiwayatPenjualanController::class, 'searchfromDate']);
    Route::get('/canceltrans/{id}', [RiwayatPenjualanController::class, 'cancel']);
    Route::get('/riwayatpenjualan/cetakstruk/{id}', [RiwayatPenjualanController::class, 'print']);

    Route::match(['get', 'post'], "/laporan", [LaporanController::class, 'index'])->name('laporan.index');
    Route::match(['get', 'post'], "/laporanpiutang", [LaporanController::class, 'piutang'])->name('laporan.piutang');
    Route::match(['get', 'post'], "/laporanbulanan", [LaporanController::class, 'bulanan'])->name('laporan.bulanan');
    Route::get('/exportlaporan/{datefrom}/{dateto}', [LaporanController::class, 'export']);
    Route::get('/exportlaporanpiutang/{datefrom}/{dateto}', [LaporanController::class, 'exportpiutang']);
    Route::get('/exportlaporanbulanan/{datefrom}/{dateto}', [LaporanController::class, 'exportbulanan']);

    Route::post('/store', [PenjualanPoController::class, 'store'])->name('penjualanpo.store');
    Route::resource('/penjualanpo', PenjualanPoController::class);

    Route::resource("/riwayatpenjualanpo",RiwayatPenjualanPoController::class);
    Route::get('/detailriwayatpo/{id}', [RiwayatPenjualanPoController::class, 'show'])->name('riwayatpenjualanpo.show');
    Route::get('/edittranspo/{id}', [RiwayatPenjualanPoController::class, 'edit']);
    Route::post('/updatetranspo/{id}', [RiwayatPenjualanPoController::class, 'update']);
    Route::post('/searchfromdatepo', [RiwayatPenjualanPoController::class, 'searchfromDatePo']);
    Route::get('/canceltranspo/{id}', [RiwayatPenjualanPoController::class, 'cancelpo']);
    Route::get('/riwayatpenjualanpo/cetakstruk/{id}', [RiwayatPenjualanPoController::class, 'print']);

    Route::match(['get', 'post'], "/laporanpo", [LaporanController::class, 'po'])->name('laporan.po');
    Route::match(['get', 'post'], "/laporanpiutangpo", [LaporanController::class, 'piutangpo'])->name('laporan.piutangpo');
    Route::match(['get', 'post'], "/laporanbulananpo", [LaporanController::class, 'bulananpo'])->name('laporan.bulananpo');
    Route::match(['get', 'post'], "/laporanjadwalpo", [LaporanController::class, 'jadwalpo'])->name('laporan.jadwalpo');
    Route::get('/exportlaporanpo/{datefrom}/{dateto}', [LaporanController::class, 'exportpo']);
    Route::get('/exportlaporanpiutangpo/{datefrom}/{dateto}', [LaporanController::class, 'exportpiutangpo']);
    Route::get('/exportlaporanbulananpo/{datefrom}/{dateto}', [LaporanController::class, 'exportbulananpo']);
    Route::get('/exportlaporanjadwalpo/{datefrom}/{dateto}', [LaporanController::class, 'exportjadwalpo']);


});


require __DIR__.'/auth.php';
