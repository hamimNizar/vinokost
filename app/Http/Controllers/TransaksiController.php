<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index(){
        
        $alltransaksi = DB::table('transaksi')
                            ->leftJoin('penyewaan', 'transaksi.id_penyewaan','=','penyewaan.id_penyewaan')
                            ->leftJoin('kamar', 'penyewaan.id_kamar','=','kamar.id_kamar')
                            ->leftJoin('user', 'penyewaan.id_user','=','user.id_user')
                            ->select('transaksi.*','transaksi.status as statustransaksi', 'penyewaan.*', 'kamar.*', 'user.*')
                            ->get();

        return view('admin.transaksi', ['datatransaksi'=>$alltransaksi]);
    }

    public function detail($id){
        $datatransaksi = DB::table('transaksi')
                            ->leftJoin('penyewaan', 'transaksi.id_penyewaan','=','penyewaan.id_penyewaan')
                            ->leftJoin('kamar', 'penyewaan.id_kamar','=','kamar.id_kamar')
                            ->leftJoin('user', 'penyewaan.id_user','=','user.id_user')
                            ->select('transaksi.*','transaksi.status as statustransaksi', 'penyewaan.*', 'kamar.*', 'user.*')
                            ->where('id_transaksi', $id)
                            ->get()->first();
        
        return view('admin.transaksi-detail', ['detailtransaksi'=>$datatransaksi]);
    }

    public function createTransaksi(Request $request){
        //menyimpan data transaksi yang dihasilkan json_callback
        //sekaligus mengganti (edit) kolom keterangan pada tabel penyewaan menjadi berjalan.
        
        $datajson = json_decode($request->get('json'));
        $addtransaksi = new Transaksi([
            // 'key'=> $datajson->transaction_id,
        ]);
        $addtransaksi->save();


        //redirect ke halaman tagihan maka akan muncul pesan tagihan sudah terbayarkan
        return response()->json($request);
    }

    public function cetakStruk($id){
        
    }

    public function penghuniRiwayatSewa(){
        //get data dari tabel transaksi yang status nya settlement
        $alltransaksi = DB::table('transaksi')
                            ->leftJoin('penyewaan', 'transaksi.id_penyewaan','=','penyewaan.id_penyewaan')
                            ->leftJoin('kamar', 'penyewaan.id_kamar','=','kamar.id_kamar')
                            ->leftJoin('user', 'penyewaan.id_user','=','user.id_user')
                            ->select('transaksi.*','transaksi.status as statustransaksi', 'penyewaan.*', 'kamar.*', 'user.*')
                            ->where('user.id_user', session()->get('nama_penghuni'))
                            ->get();
        return view('penghuni.transaksi', ['datatransaksi'=>$alltransaksi]);
    }
}
