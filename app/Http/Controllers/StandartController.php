<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Standart;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StandartController extends Controller
{
    public function index()
    {
        $data = Standart::orderBy('id', 'DESC')->paginate(15);
        return view('admin.standart.index', compact('data'));
    }

    public function create()
    {
        $kriteria = Kriteria::get();
        $subkriteria = SubKriteria::get();
        return view('admin.standart.create', compact('kriteria', 'subkriteria'));
    }
    public function edit($id)
    {
        $data = Standart::find($id);
        $kriteria = Kriteria::get();
        $subkriteria = SubKriteria::get();
        return view('admin.standart.edit', compact('data', 'kriteria', 'subkriteria'));
    }
    public function store(Request $req)
    {
        $subkriteria = SubKriteria::find($req->subkriteria_id);
        $check = Standart::where('kriteria_id', $subkriteria->kriteria->id)->first();
        if ($check != null) {
            Session::flash('error', 'Kriteria ' . $subkriteria->kriteria->nama . ' Sudah di masukkan');
            return back();
        } else {
            $param['kriteria_id'] = $subkriteria->kriteria->id;
            $param['subkriteria_id'] = $subkriteria->id;
            $param['nilai'] = $subkriteria->nilai;
            Standart::create($param);
            Session::flash('success', 'Berhasil');
            return redirect('/superadmin/standart');
        }
    }
    public function update(Request $req, $id)
    {
        $kriteria_id = SubKriteria::find($id)->kriteria->id;
        $kriteria_id2 = SubKriteria::find($req->subkriteria_id)->kriteria->id;


        $subkriteria = SubKriteria::find($req->subkriteria_id);
        $param['kriteria_id'] = $subkriteria->kriteria->id;
        $param['subkriteria_id'] = $subkriteria->id;
        $param['nilai'] = $subkriteria->nilai;

        $data = Standart::find($id)->update($param);
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/standart');
    }
    public function delete($id)
    {
        $data = Standart::find($id)->delete();
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/standart');
    }
}
