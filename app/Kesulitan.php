<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kesulitan extends Model
{
    public function soal()
    {
        return $this->hasMany('App\Soal');
    }
    
}
