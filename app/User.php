<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email_id', 'contact_number', 'dob', 'place_birth','status','address'
    ];
}
