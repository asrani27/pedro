<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Siswa;
use App\Models\Jurusan;
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
        $data = Siswa::get();
        return view('admin.perhitungan.siswa', compact('data'));
    }

    public function detail($id_siswa)
    {
        $siswa = Siswa::find($id_siswa);
        $data = Perhitungan::where('siswa_id', $id_siswa)->get()->map(function ($item) use ($id_siswa) {
            $nilai_gap_core = Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $item->jurusan_id)->where('factor_id', 1)->get()->map(function ($value) {
                $value->nilai_gap = (float) str_replace(',', '.', $value->nilai_gap);
                return $value;
            })->sum('nilai_gap');
            $nilai_gap_second = Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $item->jurusan_id)->where('factor_id', 2)->get()->map(function ($value) {
                $value->nilai_gap = (float) str_replace(',', '.', $value->nilai_gap);
                return $value;
            })->sum('nilai_gap');
            $item->rata_core = round($nilai_gap_core / Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $item->jurusan_id)->where('factor_id', 1)->count(), 2);
            $item->rata_second = round($nilai_gap_second / Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $item->jurusan_id)->where('factor_id', 2)->count(), 2);
            $item->total = (0.6 * $item->rata_core) + (0.4 * $item->rata_second);
            return $item;
        });

        $ranking  = $data->where('tampil_total', 'Y')->sortByDesc('total')->values()->map(function ($item, $value) {
            if ($item->total == 0) {
                $item->rank = null;
            } else {
                $item->rank = $value + 1;
            }
            return $item;
        });

        return view('admin.perhitungan.index', compact('data', 'ranking', 'siswa'));
    }
    public function simpan($id_siswa)
    {
        $siswa = Siswa::find($id_siswa);
        $data = Perhitungan::where('siswa_id', $id_siswa)->get()->map(function ($item) use ($id_siswa) {
            $nilai_gap_core = Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $item->jurusan_id)->where('factor_id', 1)->get()->map(function ($value) {
                $value->nilai_gap = (float) str_replace(',', '.', $value->nilai_gap);
                return $value;
            })->sum('nilai_gap');
            $nilai_gap_second = Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $item->jurusan_id)->where('factor_id', 2)->get()->map(function ($value) {
                $value->nilai_gap = (float) str_replace(',', '.', $value->nilai_gap);
                return $value;
            })->sum('nilai_gap');
            $item->rata_core = round($nilai_gap_core / Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $item->jurusan_id)->where('factor_id', 1)->count(), 2);
            $item->rata_second = round($nilai_gap_second / Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $item->jurusan_id)->where('factor_id', 2)->count(), 2);
            $item->total = (0.6 * $item->rata_core) + (0.4 * $item->rata_second);
            return $item;
        });

        $ranking  = $data->where('tampil_total', 'Y')->sortByDesc('total')->values()->map(function ($item, $value) {
            if ($item->total == 0) {
                $item->rank = null;
            } else {
                $item->rank = $value + 1;
            }
            return $item;
        });
        $check = $ranking->where('rank', 1)->first();

        if ($check == NULL) {
        } else {
            $siswa->update([
                'nilai' => $check->total,
                'jurusan' => $check->jurusan->nama,
            ]);
        }
        Session::flash('success', 'Berhasil di simpan');
        return redirect('superadmin/perhitungan');
    }
    public function reset($id_siswa)
    {
        Perhitungan::where('siswa_id', $id_siswa)->get()->map->delete();
        Session::flash('success', 'Berhasil di hapus');
        return back();
    }
    public function storeJurusan($id_siswa)
    {
        $jurusan = Jurusan::get();
        $kriteria = Kriteria::get();

        foreach ($jurusan as $j) {

            foreach ($kriteria as $k) {
                $check = Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $j->id)->where('factor_id', $k->jenis->id)->where('tampil_rata', 'Y')->first();
                if ($check == null) {
                    $n = new Perhitungan;
                    $n->siswa_id = $id_siswa;
                    $n->jurusan_id = $j->id;
                    $n->kriteria_id = $k->id;
                    $n->factor_id = $k->jenis->id;
                    $n->tampil_rata = "Y";
                    $n->save();
                } else {
                    $n = new Perhitungan;
                    $n->siswa_id = $id_siswa;
                    $n->jurusan_id = $j->id;
                    $n->kriteria_id = $k->id;
                    $n->factor_id = $k->jenis->id;
                    $n->save();
                }

                $check2 = Perhitungan::where('siswa_id', $id_siswa)->where('jurusan_id', $j->id)->where('tampil_total', 'Y')->first();
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


    public function subkriteria($id, $id_siswa)
    {
        $data = Perhitungan::find($id);
        $subkriteria = Kriteria::find($data->kriteria_id)->subkriteria;
        return view('admin.perhitungan.nilai', compact('data', 'subkriteria', 'id_siswa'));
    }
    public function updateSubkriteria(Request $req, $id, $id_siswa)
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
        return redirect('/superadmin/perhitungan/' . $id_siswa . '/detail');
    }
}
