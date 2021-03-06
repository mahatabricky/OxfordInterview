<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
   

    protected $fillable = ['name','description','user_id'];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

   
}
