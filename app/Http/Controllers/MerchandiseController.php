<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\Merchandise;

class MerchandiseController extends Controller
{
    public function index()
    {
    	return view('admin.merchandise');
    }

    public function savemerchandise(Request $r)
    {
/*    	$t = new Merchandise;

    	$t->logo = $r->input('logo');
        $file = $r->file('logo');
        $filename = $file->getClientOriginalName();
        $r->file('logo')->move("picture1/", $filename);
        $t->logo = $filename;

    	$t->nama = $r->input('nama');
    	$t->deskripsi = $r->input('deskripsi');
    	
    	$t->save();
    	return redirect(url('admin/merchandise'));*/


        $m = new Merchandise;
        $m->nama = $r->input('nama');
        $m->deskripsi = $r->input('deskripsi');
        if (Input::hasFile('logo')) {
            $file1 = $r->file('logo');
            $filename1 = $file1->getClientOriginalName();
            Input::file('logo')->move(storage_path('images'), $filename1);
            $m->logo = $filename1;
        }
        $m->save();
        return redirect(url('/admin/merchandise'));
    }

    public function editmerchandise($id)
    {
    	$merchandise = Merchandise::find($id);
    	return view('admin.merchandise.edit')->with('merchandise',$merchandise);
    }
    public function updatemerchandise(Request $r)
    {
/*    	$s = Merchandise::find($m->input('id'));

    	$file = $m->file('logo');
        $filename = $file->getClientOriginalName();
        $m->file('logo')->move("picture1/", $filename);
        $s->logo = $filename;

    	$s->nama = $m->input('nama');
    	$s->deskripsi = $m->input('deskripsi');
        
    	$s->save();
    	return redirect(url('admin/merchandise'));*/

        $m = Merchandise::find($r->input('id'));
        $m->nama = $r->input('nama');
        $m->deskripsi = $r->input('deskripsi');
        if (Input::hasFile('logo')) {
            $file1 = $r->file('logo');
            $filename1 = $file1->getClientOriginalName();
            Input::file('logo')->move(storage_path('images'), $filename1);
            $m->logo = $filename1;
        }
        $m->save();
        return redirect(url('/admin/merchandise')); 
    }
    public function deletemerchandise($id)
    {
    	$nama = Merchandise::find($id);
    	$nama->delete();
    	return redirect(url('admin/merchandise'));
    }
}
