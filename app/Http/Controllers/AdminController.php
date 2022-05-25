<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function showLogin(){
        return view('admin.login');
    }
    public function adminLogin(Request $request){
        // dd($request->all());
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $datalogadmin = User::where('username', $request->username)
                                ->where('password', $request->password)
                                ->where('jenis_user', 'Admin')
                                ->get();
                                // dd(count($datalogadmin));
        if(count($datalogadmin)<1){
            // return response()->json('disiini');
            
            return redirect('admin/login')->with('pesanlogin', 'Periksa Username dan Password Anda !');
        }else{
            $request->session()->put('nama_admin',$datalogadmin[0]['nama_user']);
            // return response()->json($datalogadmin[0]['nama_admin']);
            return redirect('admin/')->with('pesanlogin', 'Anda Berhasil Login Sebagai Admin');


        }
    }
    public function adminLogout(Request $request){
        $request->session()->forget('nama_admin');
        return redirect('admin/login')->with('logedout', 'Anda telah log out dari Admin');
    }

    public function showProfil(){
        $admindata = User::where('nama_user', session()->get('nama_admin'))->where('jenis_user', 'Admin')->get();
        
        return view('admin.profil', ['dataadmin'=>$admindata]);
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
                
            return redirect('/admin')->with('pesanlogin', 'Data Admin dan Password telah berhasil diedit !');
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
                
        return redirect('/admin')->with('pesanlogin', 'Data Admin telah berhasil diedit !');
    }

    public function adminDashboard(){
        $allkamar = Kamar::all();
        $allpenghuni = User::where('jenis_user', 'Penghuni')->get();
        
        return view('admin.index', ['allkamar'=>$allkamar->count(), 'allpenghuni'=>$allpenghuni->count()]);
    }
}
