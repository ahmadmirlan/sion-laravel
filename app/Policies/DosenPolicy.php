<?php

namespace App\Policies;

use App\Dosen;
use App\Kelas;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DosenPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function modify(Dosen $dosen, Kelas $kelas){
        return $dosen->id != $kelas->id_dosen;
    }
}
