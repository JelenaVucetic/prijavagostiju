<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $table = 'debts';
    public $timestamps = true;
    protected $fillable = [
        'user_id', 'guest_id', 'landlord_id', 'check_in', 'check_out', 'price', 'created_at'
    ];

}
