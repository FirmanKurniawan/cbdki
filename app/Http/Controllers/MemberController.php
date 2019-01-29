<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Member;
use DB;

class MemberController extends Controller
{
    public function index(){
    	return view('admin.member.index');
    }

    public function add(){
    	return view('admin.member.add');
    }

    public function save(Request $r){
    	$m = new Member;
    	$m->nama = $r->input('nama');
    	$m->alamat = $r->input('alamat');
    	$m->no_identitas = $r->input('no_identitas');
    	if (Input::hasFile('foto')) {
            $file1 = $r->file('foto');
            $filename1 = $file1->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'), $filename1);
            $m->foto = $filename1;
        }
        $m->save();
        return redirect(url('/admin/member'));
    }

	public function edit($id)
	{
		$m = Member::find($id);
		return view('admin.member.edit')->with('m', $m);
	}

	public function update(Request $r)
	{
		$m = Member::find($r->input('id'));
    	$m->nama = $r->input('nama');
    	$m->alamat = $r->input('alamat');
    	$m->no_identitas = $r->input('no_identitas');
    	if (Input::hasFile('foto')) {
            $file1 = $r->file('foto');
            $filename1 = $file1->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'), $filename1);
            $m->foto = $filename1;
        }
        $m->save();
        return redirect(url('/admin/member'));		
	}

	public function delete($id)
	{
		$m = Member::find($id);
		$m->delete();
		return redirect(url('/admin/member'));
	}

    // public function search(Request $request)
    // {
    //     $search = $request->search;

    //     $member = Member::all()->where('nama', 'like', '%'.$search.'%');

    //     return view('member', compact('member'));
    // }

    public function zz()
    {    
        $pem = Member::all();
        return view('member')->with('pem',$pem);
    }

    public function search(Request $r)
    {
        $query = $r->input('query');
        $show = \App\Member::where('nama',$query)->get();
        return view('member')->with('show', $show);
    }

    public function search2(Request $r)
    {
        if ($r->has('nama')) {
        return Member::where('nama','like','%'.$nama.'%')->get();
        }
    return response([]);
    }

    public function search(Request $request)
    {
    if ($request->has('name')) {
       return User::where('name','like','%'.$name.'%')->get();
        }
    return response([]);
    }

}
