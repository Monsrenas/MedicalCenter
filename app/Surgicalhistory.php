<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Surgicalhistory extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surgicalhistory';
    
    protected $fillable = [
							'identification', 
							'surgical',
							
    ];
}
