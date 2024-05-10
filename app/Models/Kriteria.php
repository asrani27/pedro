<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function jenis()
    {
        return $this->belongsTo(Factor::class, 'factor_id');
    }
    public function subkriteria()
    {
        return $this->hasMany(SubKriteria::class, 'kriteria_id');
    }
}
