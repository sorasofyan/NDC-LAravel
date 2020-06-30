<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table ="countries";
    protected $fillable=[ 
        'name',
        'ISO2',
        'code',
        'area',
    ];
    protected $guarded = ['population'];
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
