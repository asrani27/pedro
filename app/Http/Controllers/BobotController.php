<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BobotController extends Controller
{
    public function index()
    {
        $data = Bobot::orderBy('id', 'DESC')->paginate(15);
        return view('admin.bobot.index', compact('data'));
    }

    public function create()
    {
        return view('admin.bobot.create');
    }
    public function edit($id)
    {
        $data = Bobot::find($id);
        return view('admin.bobot.edit', compact('data'));
    }
    public function store(Request $req)
    {
        $check = Bobot::where('nama', $req->nama)->first();
        if ($check != null) {
            Session::flash('error', 'Nama bobot Sudah Ada');
            return back();
        } else {
            Bobot::create($req->all());
            Session::flash('success', 'Berhasil');
            return redirect('/superadmin/bobot');
        }
    }
    public function update(Request $req, $id)
    {
        $data = Bobot::find($id)->update($req->all());
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/bobot');
    }
    public function delete($id)
    {
        $data = Bobot::find($id)->delete();
        Session::flash('success', 'Berhasil');
        return redirect('/superadmin/bobot');
    }
}
