<?php

namespace App\Http\Controllers;
Use App\Models\Pengaturan_Aplikasi;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function tampilan()
    {
        $apotek_id = 1;
        $pengaturan = Pengaturan_Aplikasi::where('apotek_id',$apotek_id)->first();
        $data['pengaturan'] = $pengaturan;
        return view('back.pages.pengaturan.tampilan', $data);
    }

    public function updateTampilan(Request $request,$id)
    {
        // dd($request->all(),$id);
        $setting = Pengaturan_Aplikasi::find($id);
        if($request->hasFile('profile_avatar')){
            $path = 'file_ref/pengaturan_aplikasi/';
            $img_ex = $path.$setting->logo_aplikasi;
            if($img_ex != 'default.png'){
                if(is_file($img_ex)){
                    unlink($img_ex);
                }
            }
            $file = $request->file('profile_avatar');
            $file_name = str_slug($request->nama_aplikasi) . time() . "." . $file->getClientOriginalExtension();
            $target = $path . $file_name;
            Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($target);
            $setting->logo_aplikasi = $file_name;
        }
        $setting->nama_aplikasi = ucfirst($request->nama_aplikasi);
        $setting->alamat_aplikasi = $request->alamat;
        $setting->no_telp = $request->telp;
        $setting->save();
        return redirect()->back()->with('success','Berhasil menyimpan perubahan');
    }
}
