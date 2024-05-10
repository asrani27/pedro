<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('id', 'DESC')->paginate(15);
        return view('admin.siswa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }
    public function edit($id)
    {
        $data = Siswa::find($id);
        return view('admin.siswa.edit', compact('data'));
    }
    public function store(Request $req)
    {
        $check = Siswa::where('nama', $req->nama)->first();
        if ($check != null) {
            Session::flash('error', 'Nama siswa Sudah Ada');
            return back();
        } else {
            Siswa::create($req->all());
            Session::flash('success', 'Berhasil');
            return redirect('/superadmin/siswa');
        }
    }
    public function update(Request $req, $id)
    {
        $data = Siswa::find($id)->update($req->all());
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/siswa');
    }
    public function delete($id)
    {
        $data = Siswa::find($id)->delete();
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/siswa');
    }
}
