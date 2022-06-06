<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table    = 'karyawan';

    protected $fillable     =   [ 
                                'nama',
                                'nik',
                                'telp',
                                'id_user',
                                'id_toko',
                              
                                ];  
}

