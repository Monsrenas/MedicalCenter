<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Familyhistory extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'familyhistory';
    
    protected $fillable = [
							'identification', 
							'livingage',
							'deceasedage',
							'health',
							'cause',
							'maternal',
							'paternal',
							'period',
							'pregnancies',
							'miscarriages',
							'abortions',
							'papsmear',
							'papsmearresult',
							'mamogram',
							'mamogramresult',
							'menopause',
							'periods',
    ];
}
