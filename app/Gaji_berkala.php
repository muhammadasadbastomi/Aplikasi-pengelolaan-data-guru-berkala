<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji_berkala extends Model
{
    protected $fillable = [
        'uuid','golongan_id','mkg','besaran_gaji',
    ];

    protected $hidden = [
        'id'
    ];

    public function golongan()
    {
     return $this->belongsTo('App\Golongan');
    }
}
