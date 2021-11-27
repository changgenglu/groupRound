<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;
    protected $table = "usercomment";
    // protected $foreignKey = 'eventId';
    public $timestamps = false;
    function event() {
        return $this->belongsTo(Event::class, 'eventId'); }
    function user() {
        return $this->belongsTo(User::class, 'userIdJion'); 
}
}