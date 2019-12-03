<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Discharge extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'discharge';
    
    protected $fillable = [
							'identification',
							'user_id',
							'date',
							'time',
							'admission_date',
							'admission_resume',
							'discharge_resume',
							'discharge_reason',
							'authorizing_doctor',
    ];
}