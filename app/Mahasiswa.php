<?php

namespace App;

use App\Notifications\MahasiswaResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim','nama','tanggalLahir','jurusan_id','agama_id','kode_rfid', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MahasiswaResetPassword($token));
    }

    public function jurusan(){
        return $this->hasOne(Jurusan::class, 'jurusan_id');
    }

    public function agama(){
        return $this->hasOne(Agama::class, 'agama_id');
    }
}
