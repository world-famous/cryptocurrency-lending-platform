<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposits';
    protected $fillable = array( 'trxid','user_id', 'amount', 'status');
   

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
