<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Appointment extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'appointments';
    
    protected $fillable = [	'id',
							'dr_code',
							'date',
							'time',
							'date_done',
							'time_done',
							'identification',
							'details',
							'user', 
							'status',
    ];
}
