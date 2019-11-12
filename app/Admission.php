<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Admission extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'admission';
    
    protected $fillable = [
							'identification',
							'user_id',
							'date',
							'timearrives',
							'time_hospitalization',
							'date_hospitalization',
							'admission_note',
							'symptom',
							'diagnostic',
							'informant',
    ];
}
