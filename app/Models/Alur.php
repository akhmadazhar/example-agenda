<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alur extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class, 'id_agenda');
    }
}
