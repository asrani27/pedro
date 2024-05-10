<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Standart;
use App\Models\Perhitungan;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PerhitunganController extends Controller
{
    public function index()
    {
        $data = Perhitungan::get()->map(function ($item) {
            $nilai_gap_core = Perhitungan::where('siswa_id', $item->siswa_id)->where('factor_id', 1)->get()->map(function ($value) {
                $value->nilai_gap = (float) str_replace(',', '.', $value->nilai_gap);
                return $value;
            })->sum('nilai_gap');
            $nilai_gap_second = Perhitungan::where('siswa_id', $item->siswa_id)->where('factor_id', 2)->get()->map(function ($value) {
                $value->nilai_gap = (float) str_replace(',', '.', $value->nilai_gap);
                return $value;
            })->sum('nilai_gap');
            $item->rata_core = $nilai_gap_core / Perhitungan::where('siswa_id', $item->siswa_id)->where('factor_id', 1)->count();
            $item->rata_second = $nilai_gap_second / Perhitungan::where('siswa_id', $item->siswa_id)->where('factor_id', 2)->count();
            $item->total = (0.6 * $item->rata_core) + (0.4 * $item->rata_second);
            return $item;
        });

        $ranking  = $data->where('tampil_total', 'Y')->sortByDesc('total')->values()->map(function ($item, $value) {
            $item->rank = $value + 1;
            return $item;
        });

        return view('admin.perhitungan.index', compact('data', 'ranking'));
    }
    public function reset()
    {
        Perhitungan::get()->map->delete();
        Session::flash('success', 'Berhasil di hapus');
        return back();
    }
    public function storeSiswa()
    {
        $siswa = Siswa::get();
        $kriteria = Kriteria::get();

        foreach ($siswa as $s) {

            foreach ($kriteria as $k) {
                $check = Perhitungan::where('siswa_id', $s->id)->where('factor_id', $k->jenis->id)->where('tampil_rata', 'Y')->first();
                if ($check == null) {
                    $n = new Perhitungan;
                    $n->siswa_id = $s->id;
                    $n->kriteria_id = $k->id;
                    $n->factor_id = $k->jenis->id;
                    $n->tampil_rata = "Y";
                    $n->save();
                } else {
                    $n = new Perhitungan;
                    $n->siswa_id = $s->id;
                    $n->kriteria_id = $k->id;
                    $n->factor_id = $k->jenis->id;
                    $n->save();
                }

                $check2 = Perhitungan::where('siswa_id', $s->id)->where('tampil_total', 'Y')->first();
                if ($check2 == null) {
                    $n->update(['tampil_total' => 'Y']);
                }
                $nilai_dicari = Standart::where('kriteria_id', $k->id)->first()->subkriteria->nilai;
                $n->update(['nilai_dicari' => $nilai_dicari]);
            }
        }

        Session::flash('success', 'Berhasil di masukkan');
        return back();
    }


    public function subkriteria($id)
    {
        $data = Perhitungan::find($id);
        $subkriteria = Kriteria::find($data->kriteria_id)->subkriteria;
        return view('admin.perhitungan.nilai', compact('data', 'subkriteria'));
    }
    public function updateSubkriteria(Request $req, $id)
    {

        $subkriteria = SubKriteria::find($req->subkriteria_id);
        $gap = $subkriteria->nilai - Perhitungan::find($id)->nilai_dicari;
        $nilai_gap = Bobot::where('selisih', $gap)->first()->nilai;
        Perhitungan::find($id)->update([
            'subkriteria_id' => $subkriteria->id,
            'nilai_profil' => $subkriteria->nilai,
            'gap' => $gap,
            'nilai_gap' => $nilai_gap,
        ]);

        Session::flash('success', 'Berhasil di simpan');
        return redirect('/superadmin/perhitungan');
    }
}
