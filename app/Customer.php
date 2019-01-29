<?php

namespace App;

use Moloquent;

class Customer extends Moloquent
{
    //
    protected $collection = 'customers';
    protected $connection = 'mongodb';
    protected $primaryKey = 'name';
}
