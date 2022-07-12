<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanFoto extends Model
{
    use HasFactory;

    protected $table = 'foto_kegiatan';
    protected $primaryKey = 'id_foto';
    protected $guarded = ['id_foto'];
}
