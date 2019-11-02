<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Physiciansnote extends Eloquent
{	
    protected $connection = 'mongodb';
    protected $collection = 'physiciansnote';
    
    protected $fillable = [	'id',
							'identification', 
							'evolution',
							'treatment',
							'drug'
    ];
}
