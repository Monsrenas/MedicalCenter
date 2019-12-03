<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Appointment extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'appointments';
    
    protected $fillable = [
							'dr_code',
							'date',
							'time',
							'identification'
							'details'
							'user', 
							'exams',
							'status',
    ];
}
