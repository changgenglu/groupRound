<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userRecord extends Model
{
    use HasFactory;
    protected $table = 'userrecord';
    protected $primaryKey = 'id';
    public $timestamps = false;

    function event() {
        return $this->belongsTo('App\Models\Event', 'eventId', 'eventId');
    } 
    function user() {
        return $this->hasOne('App\Models\User', 'userId','userId');
    }
}