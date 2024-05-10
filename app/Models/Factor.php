<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;
    protected $table = 'factor';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'factor_id');
    }
}
