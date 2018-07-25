<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soals';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function jenis()
    {
        return $this->belongsTo('App\Jenis');
    }

    public function bidang()
    {
        return $this->belongsTo('App\Bidang');
    }

    public function kesulitan()
    {
        return $this->belongsTo('App\Kesulitan');
    }

    public function subbidang()
    {
        return $this->belongsTo('App\Subbidang');
    }

}
