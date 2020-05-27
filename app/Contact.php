<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['web','email','phone','addr'];

    protected $table='contacts';

}
