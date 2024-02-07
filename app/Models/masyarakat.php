<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as authenticatable;

class masyarakat extends Authenticatable
{
    use HasFactory;

    protected $table='masyarakat';

    protected $primarykey='nik';

    // protected $fillable=[
    //     'nik',
    //     'nama',
    //     'username',
    //     'password',
    //     'telp',
    // ];

    protected $guards = ['id'];

}
