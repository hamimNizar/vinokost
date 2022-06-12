<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
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
        // return $request;
        //menyimpan data transaksi yang dihasilkan json_callback
        //sekaligus mengganti (edit) kolom keterangan pada tabel penyewaan menjadi berjalan.
        
        $datajson = json_decode($request->get('json_callback'));
        // dd($datajson);
        $addtransaksi = new Transaksi([
            'kode_transaksi'=> $datajson->transaction_id,
            'id_penyewaan'=> $datajson->order_id,
            'tipe_pembayaran'=> $datajson->payment_type,
            'kode_pembayaran'=> isset($datajson->payment_code) ? $datajson->payment_code : null,
            'jumlah'=> $datajson->gross_amount,
            'status'=> $datajson->transaction_status,
            'tanggal_transaksi'=> $datajson->transaction_time,
        ]);
        $addtransaksi->save();

        DB::table('penyewaan')->where('id_penyewaan', $datajson->order_id)
                        ->update(array(
                            'keterangan'=>'Berjalan',
                        ));

        return redirect('/penghuni/tagihan')->with('success', 'Segera lakukan pembayaran !');
        
    }

    public function cetakStruk($id){
        $datatransaksi = DB::table('transaksi')
                            ->leftJoin('penyewaan', 'transaksi.id_penyewaan','=','penyewaan.id_penyewaan')
                            ->leftJoin('kamar', 'penyewaan.id_kamar','=','kamar.id_kamar')
                            ->leftJoin('user', 'penyewaan.id_user','=','user.id_user')
                            ->select('transaksi.*','transaksi.status as statustransaksi', 'penyewaan.*', 'kamar.*', 'user.*')
                            ->where('id_transaksi', $id)
                            ->get()->first();

        return view('admin.cetak', ['detailtransaksi'=>$datatransaksi]);
    }

    public function paymentHandler(Request $request){
        
        $signature_key = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if($signature_key != $request->signature_key){
            return 'This is invalid';
        }

        $datatransaksi = Transaksi::where('kode_transaksi', $request->transaction_id)->first();
        $datatransaksi->update(['status'=>$request->transaction_status]);
        return 'Transaction status Settlement';
    }

    public function penghuniRiwayatSewa(){
        //get data dari tabel transaksi yang status nya settlement
        $alltransaksi = DB::table('transaksi')
                            ->leftJoin('penyewaan', 'transaksi.id_penyewaan','=','penyewaan.id_penyewaan')
                            ->leftJoin('kamar', 'penyewaan.id_kamar','=','kamar.id_kamar')
                            ->leftJoin('user', 'penyewaan.id_user','=','user.id_user')
                            ->select('transaksi.*','transaksi.status as statustransaksi', 'penyewaan.*', 'kamar.*', 'user.*')
                            ->where('user.nama_user', session()->get('nama_penghuni'))
                            ->get();
        return view('penghuni.transaksi', ['datatransaksi'=>$alltransaksi]);
    }
}
