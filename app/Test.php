<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $primaryKey = 'test_id';
    protected $fillable = [
        'name', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');

    }
}    

