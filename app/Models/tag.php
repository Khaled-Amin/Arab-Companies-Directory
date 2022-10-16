<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{

    public $table = "tags";
    protected $fillable = [
        "name_tag",
   
    ];

    protected $hidden = [];
      public $timestamps = false;
    public function companies(){
        
        return $this->belongsToMany('App\Models\Company');
    
    }
}