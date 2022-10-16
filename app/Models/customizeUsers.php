<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customizeUsers extends Model
{


    public $table = "customizeUesr";
    protected $fillable = [
        "nameCompany",
        "customizeCompany",
        "country",
        "city",
        "telephone",
          "phone",
            "email",
              "facebook",
                "instagram",
                  "youtube",
                    "telegram",
                      "linkeden",
                             "discreption",
                                    "icon",
                                           "tag",
                                               "title",
                                           
   
    ];

public $timestamps = false;
}