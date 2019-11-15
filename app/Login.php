<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Login extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'acceslevel';
    
    protected $fillable = [
							'user', 
							'password',
							'acceslevel',
							'speciality',
							'name',
							'surname',
							'identification',
							'email',
							'phone',
							'description',
    ];
}
