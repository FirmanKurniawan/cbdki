<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Berita;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.berita.index');
    }

    public function baca($id)
    {
        $baca = Berita::find($id);
        return view('lengkap')->with('baca',$baca);
    }
    public function save(Request $r)
    {
        $b = new Berita;
        $b->judul = $r->input('judul');
        $b->tanggal = \Carbon\Carbon::now()->format('d F Y, H:i');
        $b->isi = $r->input('isi');
        $b->penulis = $r->input('penulis');
        if (Input::hasFile('foto')) {
            $file1 = $r->file('foto');
            $filename1 = $file1->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'), $filename1);
            $b->foto = $filename1;
        }
        $b->save();
        return redirect(url('/admin/berita'));
    }

    public function edit($id)
    {
        $b = Berita::find($id);
        return view('admin.berita.edit')->with('b', $b);
    }

    public function update(Request $r)
    {
        $b = Berita::find($r->input('id'));
        $b->judul = $r->input('judul');
        $b->isi = $r->input('isi');
        if (Input::hasFile('foto')) {
            $file1 = $r->file('foto');
            $filename1 = $file1->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'), $filename1);
            $b->foto = $filename1;
        }
        $b->save();
        return redirect(url('/admin/berita'));  
    }

    public function delete($id)
    {
        $b = Berita::find($id);
        $b->delete();
        return redirect(url('/admin/berita'));
    }
    public function pagi()
    {
        $s = Berita::latest()->paginate(6);
        return view('berita')->with('s',$s);
    }
}
