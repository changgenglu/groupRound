<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "user";
    protected $primaryKey = 'userId';
    public $timestamps = false;

    function citylist()
    {
        return $this->belongsTo(Citylist::class, 'cityId');
    }
    function usercomment()
    {
        return $this->hasMany(UserComment::class, 'userId');
    }

    function department() {
        return $this->belongsTo(Citylist::class, 'cityList');
    }
    function userRecord(){
        return $this->hasMany('App\Models\UserRecord', 'userId', 'userId');
    }

}
