<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penyewaan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyewaanController extends Controller
{
    public function index(){
        $datapenyewaan = DB::table('penyewaan')
                            ->leftJoin('kamar','penyewaan.id_kamar','=','kamar.id_kamar')
                            ->leftJoin('user','penyewaan.id_user','=','user.id_user')
                            ->select('penyewaan.*', 'kamar.*', 'user.*')
                            ->get();
        
        return view('admin.penyewaan', ['datapenyewaan'=>$datapenyewaan]);
    }

    public function create(){
        $datapenghuni = User::where('jenis_user', 'Penghuni')->get();
        $datakamar = Kamar::where('status', 'Tersedia')->get();
        return view('admin.penyewaan-tambah', ['datakamar'=>$datakamar, 'datapenghuni'=>$datapenghuni]);
    }

    public function store(Request $request){
        $request->validate([
            'id_kamar' => 'required',
            'id_user' => 'required',
            'mulai_sewa' => 'required',
            'akhir_sewa' => 'required',
            'jumlah' => 'required',
        ]);

        $datapenyewaan = new Penyewaan([
            'id_kamar' => $request->get('id_kamar'),
            'id_user' => $request->get('id_user'),
            'mulai_sewa' => $request->get('mulai_sewa'),
            'akhir_sewa' => $request->get('akhir_sewa'),
            'jumlah' => $request->get('jumlah'),
        ]);
        $datapenyewaan->save();

        // $addtransaksi = new Transaksi([
        //     'id_penyewaan'=>$datapenyewaan->id_penyewaan,
        //     'jumlah'=>$datapenyewaan->jumlah,
        // ]);
        // $addtransaksi->save();
        
        Kamar::where('id_kamar', $request->get('id_kamar'))->update(array('status'=>'Disewa'));

        return redirect('/admin/penyewaan')->with('success', 'Penyewaan baru berhasil ditambahkan !');
    }

    public function detail($id){
        $datapenyewaan = Penyewaan::where('id_penyewaan', $id)->get()->first();
        $datapenghuni = User::where('jenis_user', 'Penghuni')->get();
        $datakamar = Kamar::all();
        return view('admin.penyewaan-detail', ['datakamar'=>$datakamar, 'datapenghuni'=>$datapenghuni, 'datapenyewaan'=>$datapenyewaan]);
        
    }

    public function update(Request $request, $id){
        //digunakan untuk update data tagihan jika ada update an
        $request->validate([
            'id_kamar' => 'required',
            'id_user' => 'required',
            'mulai_sewa' => 'required',
            'akhir_sewa' => 'required',
            'jumlah' => 'required',
        ]);

        DB::table('penyewaan')->where('id_penyewaan', $id)
                ->update(array(
                    'id_penyewaan' => $id,
                    'id_kamar' => $request->get('id_kamar'),
                    'id_user' => $request->get('id_user'),
                    'mulai_sewa' => $request->get('mulai_sewa'),
                    'akhir_sewa' => $request->get('akhir_sewa'),
                    'jumlah' => $request->get('jumlah'),
                ));
                
            return redirect('/admin/penyewaan')->with('success', 'Data Penyewaan telah berhasil diedit !');
    }

    public function updateIngatkan(Request $request, $id){
        //digunakan untuk mengingatkan user apakah penyewaannya diperpanjang atau tidak. 
        //Dengan mengganti value kolom keterangan menjadi Diingatkan
        DB::table('penyewaan')->where('id_penyewaan', $id)
                ->update(array(
                    'keterangan'=>'Diingatkan',
                ));
        
        return redirect('/admin/penyewaan')->with('success', 'Penyewa berhasil diingatkan. Tunggu Konfirmasi dari Penyewa!');

    }

    public function updateKonfirmasi(Request $request, $id){
        //konfirmasi lanjut atau tidak sewa indekos dari penghuni
        DB::table('penyewaan')->where('id_penyewaan', $id)
                ->update(array(
                    'keterangan'=>$request->get('keterangan'),
                ));
        return redirect('/penghuni/kamar-saya')->with('success', 'Berhasil Konfirmasi Penyewaan!');
    }

    public function penghuniTagihan(){
        //digunakan untuk menampilkan tagihan kepada penghuni
        //button pembayaran ada disini
        
        $datasewa = DB::table('penyewaan')
                        ->leftJoin('user', 'penyewaan.id_user', '=', 'user.id_user')
                        ->leftJoin('kamar', 'penyewaan.id_kamar', '=', 'kamar.id_kamar')
                        ->select('penyewaan.*', 'user.*', 'kamar.*')
                        ->where('user.nama_user', session()->get('nama_penghuni'))
                        ->where('penyewaan.keterangan', 'Pending')
                        ->orderByDesc('tanggal_sewa')
                        ->get()->first();

                        // dd($datasewa);
        // $dataTransaksi = DB::table('transaksi')
        //                     ->leftJoin('penyewaan','transaksi.id_penyewaan','=','penyewaan.id_penyewaan')
        //                     ->leftJoin('user', 'penyewaan.id_user', '=', 'user.id_user')
        //                     ->leftJoin('kamar', 'penyewaan.id_kamar', '=', 'kamar.id_kamar')
        //                     ->select('transaksi.*','penyewaan.*', 'user.*', 'kamar.*')
        //                     ->where('user.nama_user', session()->get('nama_penghuni'))
        //                     ->where('transaksi.status', 'Waiting')
        //                     ->get()->first();

        if($datasewa){
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            
            $params = array(
                'transaction_details' => array(
                    'order_id' => $datasewa->id_penyewaan,
                    'gross_amount' => $datasewa->jumlah,
                ),
                'item_details'=> [
                    array(
                        'id' => $datasewa->id_kamar,
                        'name' => $datasewa->nama_kamar,
                        'price' => $datasewa->jumlah,
                        'quantity'=> 1,
                    )
                ],
                'customer_details' => array(
                    'first_name' => $datasewa->nama_user,
                    'email' => $datasewa->email,
                    'phone' => $datasewa->no_telepon,
                ),
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('penghuni.tagihan', ['datasewa'=>$datasewa, 'snaptoken'=>$snapToken]);
        }else{

            return view('penghuni.tagihan', ['datasewa'=>$datasewa]);
        }
        
        

    }
}
