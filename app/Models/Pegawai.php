<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
