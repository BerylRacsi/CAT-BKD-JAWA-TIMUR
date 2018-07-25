<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    
    public function rsoal()
    {
        return $this->hasMany('App\Soal');
    }

}
