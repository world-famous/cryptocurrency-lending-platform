<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returnlog extends Model
{
    protected $table = 'returnlogs';
   protected $fillable = array( 'trxid','user_id','investment_id','trxtime','amount');

     public function user()
	  {
	      return $this->belongsTo('App\User');
	  }

	  public function investment()
	  {
	      return $this->belongsTo('App\Investment');
	  }
}
