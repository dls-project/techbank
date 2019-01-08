<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MEmployee extends Model
{
    protected $table = 'm_employee';

    protected $primaryKey = 'emp_id';
    public $incrementing = false;
    protected $keyType = 'string';
}
