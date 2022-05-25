<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAllKamar = Kamar::all();
        return view('admin.kamar', ['dataallkamar'=>$dataAllKamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kamar-tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kamar' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $file= $request->file('gambar');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/gambar/kamar'), $filename);

        }

        $datakamar = new Kamar([
            'nama_kamar' => $request->nama_kamar,
            'gambar' => $filename,
            'deskripsi' => $request->deskripsi,
        ]);
        $datakamar->save();

        return redirect('/admin/kamar')->with('success', 'Data Kamar telah berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataKamar = Kamar::where('id_kamar', $id)->get();
        return view('admin.kamar-detail', ['datakamar'=>$dataKamar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataKamar = Kamar::where('id_kamar', $id)->get();
        
        return view('admin.kamar-edit', ['datakamar'=>$dataKamar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kamar' => 'required',
            'deskripsi' => 'required',
        ]);

        $inputkamar = $request->all();

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file= $request->file('gambar');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/gambar/kamar'), $filename);
            
            //delete old gambar
            $oldgambar = DB::table('kamar')
                                ->select('gambar')
                                ->where('id_kamar', $id)->get();
            $oldfilepath = public_path('gambar\kamar\\'.$oldgambar[0]->gambar);
            if(File::exists($oldfilepath)){
                File::delete($oldfilepath);
            }

            DB::table('kamar')->where('id_kamar', $id)
                ->update(array(
                    'id_kamar' => $id,
                    'nama_kamar' => $request->get('nama_kamar'),
                    'gambar' => $filename,
                    'deskripsi' => $request->get('deskripsi'),
                    'status' => $request->get('status'),
                ));
                
            return redirect('/admin/kamar')->with('success', 'Data Kamar telah berhasil diedit !');
        }else{
            unset($inputkamar['gambar']);

            DB::table('kamar')->where('id_kamar', $id)
                ->update(array(
                    'id_kamar' => $id,
                    'nama_kamar' => $request->get('nama_kamar'),
                    'deskripsi' => $request->get('deskripsi'),
                    'status' => $request->get('status'),
                ));
                
            return redirect('/admin/kamar')->with('success', 'Data Kamar telah berhasil diedit !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete old gambar
        $oldgambar = DB::table('kamar')
                            ->select('gambar')
                            ->where('id_kamar', $id)->get();
        $oldfilepath = public_path('gambar\kamar\\'.$oldgambar[0]->gambar);
        if(File::exists($oldfilepath)){
            File::delete($oldfilepath);
        }
        
        Kamar::destroy('id_kamar', $id);
        return redirect('/admin/kamar')->with('success', 'Kamar Berhasil dihapus !');
    }

    public function allKamar(){
        $allkamar = Kamar::all();
        return view('penghuni.kamar', ['datakamar'=>$allkamar]);
    }

    public function kamarPenghuni(){
        $datakamarsewa = DB::table('penyewaan')
                            ->leftJoin('user', 'penyewaan.id_user', '=', 'user.id_user')
                            ->leftJoin('kamar', 'penyewaan.id_kamar', '=', 'kamar.id_kamar')
                            ->select('penyewaan.*', 'user.*', 'kamar.*')
                            ->where('user.nama_user', session()->get('nama_penghuni'))
                            ->orderByDesc('penyewaan.tanggal_sewa')
                            ->get()->first();
                            // dd($datakamarsewa);
        return view('penghuni.kamar-my', ['datasewa'=>$datakamarsewa]);
    }
}
