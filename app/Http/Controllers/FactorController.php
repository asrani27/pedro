<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FactorController extends Controller
{
    public function index()
    {
        $data = Factor::orderBy('id', 'DESC')->paginate(15);
        return view('admin.factor.index', compact('data'));
    }

    public function create()
    {
        return view('admin.factor.create');
    }
    public function edit($id)
    {
        $data = Factor::find($id);
        return view('admin.factor.edit', compact('data'));
    }
    public function store(Request $req)
    {
        $check = Factor::where('nama', $req->nama)->first();
        if ($check != null) {
            Session::flash('error', 'Nama factor Sudah Ada');
            return back();
        } else {
            Factor::create($req->all());
            Session::flash('success', 'Berhasil');
            return redirect('/superadmin/factor');
        }
    }
    public function update(Request $req, $id)
    {
        $data = Factor::find($id)->update($req->all());
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/factor');
    }
    public function delete($id)
    {
        $data = Factor::find($id)->delete();
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/factor');
    }
}
