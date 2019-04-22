<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    const MAHASISWA = 1;
    const DOSEN = 2;
    const TENDIK = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id');
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'id');
    }

    public function tendik()
    {
        return $this->hasOne(Tendik::class, 'id');
    }

    public function getNameAttribute($key)
    {
        switch ($this->type){
            case User::MAHASISWA:
                return optional($this->mahasiswa)->nama;
                break;
            case User::DOSEN:
                return optional($this->dosen)->nama;
                break;
            case User::TENDIK:
                return optional($this->tendik)->nama;
                break;
            default:
                return null;
        }

        // Tambahkan Kode yang diperlukan dibawah ini
    }

}
