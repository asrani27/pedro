<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{
    public function index()
    {
        $data = Kriteria::orderBy('id', 'DESC')->paginate(15);
        return view('admin.kriteria.index', compact('data'));
    }

    public function create()
    {
        $jenis = Factor::get();
        return view('admin.kriteria.create', compact('jenis'));
    }
    public function edit($id)
    {
        $jenis = Factor::get();
        $data = Kriteria::find($id);
        return view('admin.kriteria.edit', compact('data', 'jenis'));
    }
    public function store(Request $req)
    {
        $check = Kriteria::where('nama', $req->nama)->first();
        if ($check != null) {
            Session::flash('error', 'Nama kriteria Sudah Ada');
            return back();
        } else {
            Kriteria::create($req->all());
            Session::flash('success', 'Berhasil');
            return redirect('/superadmin/kriteria');
        }
    }
    public function update(Request $req, $id)
    {
        $data = Kriteria::find($id)->update($req->all());
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/kriteria');
    }
    public function delete($id)
    {
        $data = Kriteria::find($id)->delete();
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/kriteria');
    }
}
