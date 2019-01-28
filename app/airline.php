<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class airline extends Model
{
    protected $fillable = ['airline_name', 'departing', 'landing', 'country'];
}
