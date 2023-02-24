<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_user';

    protected $fillable = [
        'email',
        'nama',
        'password',
        'nohp',
        'alamat',
        'akses',
    ];

    protected $hidden = [
        'password',
    ];
}