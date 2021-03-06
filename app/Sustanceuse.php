<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Sustanceuse extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'sustanceuse';
    
    protected $fillable = [	'identification', 
							'ageuse',
							'often',
							'yearsuse',
							'lastuse',
							'yesno',
    ];
}
