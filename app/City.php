<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = [
        'name', 'local_tax_underage', 'local_tax_adult', 'created_at'
    ];

    public function landlords()
    {
        return $this->hasMany('App\Landlord');
    }
}
