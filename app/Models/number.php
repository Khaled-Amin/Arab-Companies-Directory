<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class number extends Model
{

    public $table = "numbers";
    protected $fillable = [
        "num",
    ];

    protected $hidden = [];
      public $timestamps = false;
  
}