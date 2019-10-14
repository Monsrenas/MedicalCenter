<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Physical extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'physical';
    
    protected $fillable = [	'id',
    						'identification', 
							'N',
							'DAF',
							'DAD',
							'Weight',
							'Height',
							'BMI',
							'Respiratoryrate',
							'Centralheartrate',
							'Upperextrem',
							'Lowerextrem',
    ];
}
