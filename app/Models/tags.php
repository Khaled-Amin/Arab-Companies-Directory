<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class tag extends Model
{

    public $table = "tags";
    protected $fillable = [
        "name_tag",
        "company_id"
    
    ];

public $timestamps=false;
    protected $hidden = [];
    
        public function company(){
        
        return $this->belongsTo(Company::class);
    
    }
    
}
