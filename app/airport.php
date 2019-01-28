<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class airport extends Model
{
    //
    protected $fillable = ['airport_name', 'country', 'location'];
}
