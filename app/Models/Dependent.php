<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Krovinsi;
use App\Models\Kabupaten;

class Dependent extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama','id_provinsi','id_kabupaten'
    ];

    public function DataProvinsi()
    {
        return $this->belongsTo(Provinsi::class,'id_provinsi','id');
    }
    public function DataKabupaten()
    {
        return $this->belongsTo(Kabupaten::class,'id_kabupaten','id');
    }
}
