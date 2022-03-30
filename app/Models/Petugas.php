<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'admin';
    protected $table = 'petugas';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'telp',
        'role'
    ];
}
