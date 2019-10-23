<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Currentmedication extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'currentmedication';
    
    protected $fillable = [
							'identification', 
							'drugname',
							'dose',
							'allergieTo',
							'time',
    ];
}
