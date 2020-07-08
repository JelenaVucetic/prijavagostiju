<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    protected $table = 'landlords';
    public $timestamps = true;
    protected $fillable = [
        'city_id', 'firstname', 'lastname', 'jmbg', 'date_of_birth', 'address', 'debt', 'created_at'
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
