<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';

    protected $fillable = [
        'state_id', 'firstname', 'lastname', 'gender', 'date_of_birth', 'travel_document', 'travel_document_number', 'expiration_date'
    ];

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
