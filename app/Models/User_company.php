<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_company extends Model
{

    public $table = "user_company";
    protected $fillable = [
        "name",
        "email",
        "email",
        "password",
        "profilePhoto",
        "uniqueMember"
       

    ];

    protected $hidden = [];
}
