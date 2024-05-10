<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standart extends Model
{
    use HasFactory;
    protected $table = 'standart';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
    public function subkriteria()
    {
        return $this->belongsTo(subkriteria::class, 'subkriteria_id');
    }
}
