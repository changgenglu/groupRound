<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citylist extends Model
{
    use HasFactory;
    protected $table = "citylist";
    protected $primaryKey = 'cityId';
    public $timestamps = false;

}

