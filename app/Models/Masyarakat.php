<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'masyarakat';
    protected $table = 'masyarakat';
    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp',
    ];

    protected $hidden = [
        'password',
    ];
}
