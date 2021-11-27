<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $primaryKey = 'eventId';
    public $timestamps = false;

    function tagList1() {
        return $this->hasOne('App\Models\TagList', 'tagId', 'eventTag');
    }                          

    function tagList2() {
        return $this->hasOne('App\Models\TagList', 'tagId','eventTag2');
    }    

    function user() {
        return $this->hasOne('App\Models\User', 'userId','userId');
    }

    function userRecord(){
        return $this->hasMany('App\Models\UserRecord', 'eventId', 'eventId');
    }
    
}
