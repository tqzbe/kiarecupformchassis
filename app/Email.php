<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'message', 'chassis_number', 'piece_reference'];
}
