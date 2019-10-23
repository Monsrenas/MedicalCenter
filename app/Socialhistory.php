<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Socialhistory extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'socialhistory';
    
    protected $fillable = [
							'identification', 
							'education',
							'occupation',
							'hoursweek',
							'nowork',
							'religion',
							'admissionreason',
							'admissionduration',
							'sextrans',
    ];
}
