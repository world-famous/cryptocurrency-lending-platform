<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{

	protected $table = 'investments';
    protected $fillable = array( 'user_id','package_id', 'amount', 'rtime','returned','next','status');
   

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function package()
    {
        return $this->belongsTo('App\Package');
    }

    public function returnlog()
    {
        return $this->hasMany('App\Returnlog','id','investment_id');
    }

}
