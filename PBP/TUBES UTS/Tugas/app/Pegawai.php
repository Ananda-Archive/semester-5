<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = [
    	'name_lengkap','email','username','level',
    ];
    protected $hidden = [
    	'password',
    ];
}
