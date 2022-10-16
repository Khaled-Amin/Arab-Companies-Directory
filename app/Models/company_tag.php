<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class company_tag extends Model
{

    public $table = "company_tag";
    protected $fillable = [
        "id",
        "company_id",
"tag_id"        
    
    ];

public $timestamps=false;
    protected $hidden = [];
    
   
}
