<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vendor_food extends Model
{
  protected $fillable = [
    'id','vendor_id','food_name','price'
  ];
}
