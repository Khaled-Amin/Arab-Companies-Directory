<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mainClass extends Model
{

    public $table = "mainclasses";
    protected $fillable = [
        "name_mainClass",
        "href_mainClass",
        "photo_mainClass",
        "keywords_mainClass",
   
    ];

    protected $hidden = [];
}
