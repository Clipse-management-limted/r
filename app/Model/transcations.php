<?php

namespace App\Model;
use App\Model\Clients;
use Illuminate\Database\Eloquent\Model;

class transcations extends Model
{
  protected $fillable = [
      'user_id', 'vendor_id','total_amount','items','quqntity','item_price'

      ];

      public static function usersinfo($par1)
    {
     $posts=Clients::where('tag_id',$par1)->first();
     return $posts->name;
    }
}
