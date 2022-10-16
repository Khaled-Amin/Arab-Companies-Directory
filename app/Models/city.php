<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    
    use HasFactory;
public $table = "city";
    protected $fillable = ['name_city' , 'name_country'];
  public $timestamps = false;
}
