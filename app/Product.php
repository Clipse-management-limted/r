<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
  'id','name','description','photo','price','vendor_id'
];
}
