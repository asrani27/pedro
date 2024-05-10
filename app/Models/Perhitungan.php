<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;
    protected $table = 'perhitungan';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
    public function subkriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'subkriteria_id');
    }
    public function factor()
    {
        return $this->belongsTo(Factor::class, 'factor_id');
    }
}
