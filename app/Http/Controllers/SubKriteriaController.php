<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $data = SubKriteria::orderBy('id', 'ASC')->get();
        return view('admin.subkriteria.index', compact('data'));
    }

    public function create()
    {
        $jenis = Kriteria::get();
        return view('admin.subkriteria.create', compact('jenis'));
    }
    public function edit($id)
    {
        $jenis = Kriteria::get();
        $data = SubKriteria::find($id);
        return view('admin.subkriteria.edit', compact('data', 'jenis'));
    }
    public function store(Request $req)
    {
        $check = SubKriteria::where('nama', $req->nama)->first();
        if ($check != null) {
            Session::flash('error', 'Nama subkriteria Sudah Ada');
            return back();
        } else {
            SubKriteria::create($req->all());
            Session::flash('success', 'Berhasil');
            return redirect('/superadmin/subkriteria');
        }
    }
    public function update(Request $req, $id)
    {
        $data = SubKriteria::find($id)->update($req->all());
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/subkriteria');
    }
    public function delete($id)
    {
        $data = SubKriteria::find($id)->delete();
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/subkriteria');
    }
}
