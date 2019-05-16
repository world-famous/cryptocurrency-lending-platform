<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interf extends Model
{
    protected $table = 'interfaces';
    protected $fillable = array( 'abdesc', 'stdesc', 'sthead', 'ftcon');
}
