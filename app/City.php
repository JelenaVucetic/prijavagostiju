<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name', 'local_tax_underage', 'local_tax_adult'
    ];

    public function landlords()
    {
        return $this->hasMany('App\Landlord');
    }
}
