<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subClass extends Model
{

    public $table = "subclasses";
    protected $fillable = [
        "name_subClass",
        "name_mainClass",
        "href_subClass",
        "keywords_subClass",
   
    ];

    protected $hidden = [];
}
