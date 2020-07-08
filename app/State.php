<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];

    public function guests()
    {
        return $this->hasMany('App\Guest');
    }
}
