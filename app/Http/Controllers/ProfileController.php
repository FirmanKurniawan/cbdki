<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\Profile;
class ProfileController extends Controller
{
    public function all()
    {
    	$profile = Profile::where('id', 1)->first();
    	return view('admin.profile', compact('profile'));
    }

    public function update(Request $r)
    {
        $id = $r->id;
        $nama = $r->nama;
        $alamat = $r->alamat;
        $telepon = $r->telepon;
        $email = $r->email;
        $facebook = $r->facebook;
        $twitter = $r->twitter;
        $linkyt = $r->linkyt;
        $instagram = $r->instagram;
        $pengantar1 = $r->pengantar1;
        $pengantar2 = $r->pengantar2;
        $pengantar3 = $r->pengantar3;
        $gambar_depan = $r->gambar_depan;
        $gambar_about = $r->gambar_about;
        $gambar_belakang = $r->gambar_belakang;

        $profile = Profile::find(1);
        $profile->nama = $nama;
        $profile->alamat = $alamat;
        $profile->telepon = $telepon;
        $profile->email = $email;
        $profile->facebook = $facebook;
        $profile->twitter = $twitter;
        $profile->linkyt = $linkyt;
        $profile->instagram = $instagram;
        $profile->pengantar1 = $pengantar1;
        $profile->pengantar2 = $pengantar2;
        $profile->pengantar3 = $pengantar3;

        if (Input::hasFile('gambar_depan')) {
            $file1 = $r->file('gambar_depan');
            $filename1 = $file1->getClientOriginalName();
            Input::file('gambar_depan')->move(storage_path('images'), $filename1);
            $profile->gambar_depan = $filename1;
        }
        if (Input::hasFile('gambar_about')) {
            $file2 = $r->file('gambar_about');
            $filename2 = $file2->getClientOriginalName();
            Input::file('gambar_about')->move(storage_path('images'), $filename2);
            $profile->gambar_about = $filename2;
        }
        if (Input::hasFile('gambar_bawah')) {
            $file3 = $r->file('gambar_bawah');
            $filename3 = $file3->getClientOriginalName();
            Input::file('gambar_bawah')->move(storage_path('images'), $filename3);
            $profile->gambar_bawah = $filename3;
        }
    	$profile->save();

    	return redirect(url('/admin/profile'));
    }
}
