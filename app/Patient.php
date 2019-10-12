<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Patient extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'patients';
    
    protected $fillable = [
							'identification', 
							'surname',
							'name',
							'picture',
							'socio',
							'sex',
							'blood',
							'DOB',
							'nationality',
							'maritalStts',
							'addres',
							'telephone',
							'email',
							'nxOfKin',
							'relation', 
							'contact',];    



						}
