<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenghuniController extends Controller
{
    public function showLogin(){
        return view('penghuni.login');
    }
    public function penghuniLogin(Request $request){
        // dd($request->all());
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $datalogpenghuni = User::where('username', $request->username)
                                ->where('password', $request->password)
                                ->where('jenis_user', 'Penghuni')
                                ->get();
                                // dd(count($datalogadmin));
        if(count($datalogpenghuni)<1){
            // return response()->json('disiini');
            
            return redirect('penghuni/login')->with('pesanlogin', 'Periksa Username dan Password Anda !');
        }else{
            $request->session()->put('nama_penghuni',$datalogpenghuni[0]['nama_user']);
            // return response()->json($datalogadmin[0]['nama_admin']);
            return redirect('penghuni/')->with('pesanlogin', 'Anda Berhasil Login Sebagai Penghuni');
        }
    }
    public function penghuniLogout(Request $request){
        $request->session()->forget('nama_penghuni');
        return redirect('penghuni/login')->with('logedout', 'Anda telah log out dari Sistem');
    }

    public function showProfil(){
        $penghunidata = User::where('nama_user', session()->get('nama_penghuni'))->where('jenis_user', 'Penghuni')->get();
        return view('penghuni.profil', ['penghunidata'=>$penghunidata]);
    }

    public function updateProfil(Request $request, $id){
        $request->validate([
            'nama_user' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'username' => 'required',
        ]);

        if($request->get('password') != ""){
            DB::table('user')->where('id_user', $id)
                ->update(array(
                    'id_user' => $id,
                    'nama_user' => $request->get('nama_user'),
                    'alamat' => $request->get('alamat'),
                    'email' => $request->get('email'),
                    'no_telepon' => $request->get('no_telepon'),
                    'username' => $request->get('username'),
                    'password' => $request->get('password'),
                ));
                
            return redirect('/penghuni')->with('pesanlogin', 'Data Penghuni dan Password telah berhasil diedit !');
        }
        DB::table('user')->where('id_user', $id)
                ->update(array(
                    'id_user' => $id,
                    'nama_user' => $request->get('nama_user'),
                    'alamat' => $request->get('alamat'),
                    'email' => $request->get('email'),
                    'no_telepon' => $request->get('no_telepon'),
                    'username' => $request->get('username'),
                ));
                
        return redirect('/penghuni')->with('pesanlogin', 'Data Penghuni telah berhasil diedit !');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapenghuni = User::where('jenis_user', 'Penghuni')->get();
        
        return view('admin.penghuni',  ['datapenghuni'=>$datapenghuni]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.penghuni-tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $datauser = new User([
            'nama_user' => $request->nama_user,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'username' => $request->username,
            'password' => $request->password,
            'jenis_user' => 'Penghuni',
        ]);
        $datauser->save();

        return redirect('/admin/penghuni')->with('success', 'Penghuni baru telah berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailpenghuni = User::where('id_user', $id)
                                ->where('jenis_user', 'Penghuni')
                                ->get()->first();
        if($detailpenghuni == null){
            return redirect('/admin/penghuni')->with('success','Tidak ada penghuni yang dimaksud !');
        }

        return view('admin.penghuni-detail', ['detailpenghuni'=>$detailpenghuni]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'nama_user' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'username' => 'required',
        ]);

        $inputpenghuni = $request->all();

        DB::table('user')->where('id_user', $id)
                ->update(array(
                    'id_user' => $id,
                    'nama_user' => $request->get('nama_user'),
                    'alamat' => $request->get('alamat'),
                    'email' => $request->get('email'),
                    'no_telepon' => $request->get('no_telepon'),
                    'username' => $request->get('username'),
                ));
                
            return redirect('/admin/penghuni')->with('success', 'Data Penghuni telah berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy('id_user', $id);
        return redirect('/admin/penghuni')->with('success', 'Data Penghuni Berhasil dihapus !');
    }

    public function penghuniDashboard(){
        $allkamar = Kamar::all();
        $allpenghuni = User::where('jenis_user', 'Penghuni')->get();
        
        return view('penghuni.index', ['allkamar'=>$allkamar->count(), 'allpenghuni'=>$allpenghuni->count()]);
    }
}
