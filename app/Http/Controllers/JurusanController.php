<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::orderBy('id', 'DESC')->paginate(15);
        return view('admin.jurusan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }
    public function edit($id)
    {
        $data = Jurusan::find($id);
        return view('admin.jurusan.edit', compact('data'));
    }
    public function store(Request $req)
    {
        $check = Jurusan::where('nama', $req->nama)->first();
        if ($check != null) {
            Session::flash('error', 'Nama jurusan Sudah Ada');
            return back();
        } else {
            Jurusan::create($req->all());
            Session::flash('success', 'Berhasil');
            return redirect('/superadmin/jurusan');
        }
    }
    public function update(Request $req, $id)
    {
        $data = Jurusan::find($id)->update($req->all());
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/jurusan');
    }
    public function delete($id)
    {
        $data = Jurusan::find($id)->delete();
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/jurusan');
    }
}
