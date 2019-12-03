<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Services extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Services';
    
    protected $fillable = [
							'identification', 
							'code',
							'date',
							];    
						}
