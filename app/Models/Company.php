<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tag;
class Company extends Model
{

    public $table = "companies";
    protected $fillable = [
        "name_company",
        "type_company",
        "name_country",
        "city",
        "number_phone",
        "telephone_fix",
        "facebook",
        "youtube",
        "telegram",
        "instagram",
        "linkedin",
        "discreption",
        "logo",
        "title",
        "created_at",
        "updated_at",
        'email',
        'name_mainClass',
        'user_id',
        'name_url',
        'status',
        'views'
        ,'mowasa_at',
        'special'
     
    ];

    protected $hidden = [];
    
    public function tags(){
        
        return $this->belongsToMany( 'App\Models\tag');
    
    }
}
