<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
   protected $table = 'packages';
   protected $fillable = array( 'name','min','max','ret','times','period','total','fixcom','pcncom');

    public function investment()
    {
        return $this->hasMany('App\Investment', 'id', 'package_id');
    }
}
