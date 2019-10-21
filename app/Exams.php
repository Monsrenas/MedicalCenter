<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Exams extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'exams';
    
    protected $fillable = [
							'identification',
							'id', 
							'exams',
    ];
}
