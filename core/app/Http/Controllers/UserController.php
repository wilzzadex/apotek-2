<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan_Obat;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role','!=','superadmin')->orderBy('created_at','ASC')->get();
        $data['user'] = $user;
        return view('back.pages.user.user',$data);
    }

    public function add()
    {
        return view('back.pages.user.user_add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'unique:users,email',
            'username' => 'unique:users,username',
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect(route('back.user'))->with('success','Data User berhasil di simpan');

    }

    public function edit($id)
    {
        $user = User::find($id);
        $data['user'] = $user;
        return view('back.pages.user.user_edit',$data);
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->nama;
        $user->role = $request->role;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect(route('back.user'))->with('success','Data Berhasil di ubah');
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        if($user->role == 'admin'){
            $cek = Pembelian::where('user_id',$user->id)->count();
        }else{
            $cek = Penjualan_Obat::where('user_id',$user->id)->count();
        }

        if($cek > 0){
            $d = 'no';
        }else{
            $d = 'yes';
            $user->delete();
        }

        return response()->json($d);
    }

}
