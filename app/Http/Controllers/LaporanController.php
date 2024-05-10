<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bibit;
use App\Models\Bobot;
use App\Models\Deposito;
use App\Models\Kriteria;
use App\Models\Nasabah;
use App\Models\Pegawai;
use App\Models\Pencairan;
use App\Models\Pengajuan;
use App\Models\Perhitungan;
use App\Models\Sertifikat;
use App\Models\Setoran;
use App\Models\Siswa;
use App\Models\Standart;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class LaporanController extends Controller
{

    public function index()
    {
        return view('admin.laporan.index');
    }
    public function siswa()
    {
        $data = Siswa::get();
        return view('admin.laporan.siswa', compact('data'));
    }

    public function kriteria()
    {
        $data = Kriteria::get();
        return view('admin.laporan.kriteria', compact('data'));
    }
    public function bobot()
    {
        $data = Bobot::get();
        return view('admin.laporan.bobot', compact('data'));
    }
    public function profil()
    {
        $data = Standart::get();
        return view('admin.laporan.profil', compact('data'));
    }
    public function hasil()
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

        return view('admin.laporan.hasil', compact('data', 'ranking'));
    }
    public function subkriteria()
    {
        $data = SubKriteria::get();
        return view('admin.laporan.subkriteria', compact('data'));
    }
}
