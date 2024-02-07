<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;

    protected $table ='pengaduan';

    protected $primarykey ='id_pengaduan';

    protected $filliable = [
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status',
    ];

    protected $dates = ['tgl_pengaduan'];

    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'nik', 'nik');
    }
}
