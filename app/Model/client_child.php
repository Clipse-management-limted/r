<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class client_child extends Model
{
  protected $fillable = [
      'name','qrcode','reg_by','parent_qrcode',
  ];
  public static function nfo($par1)
  {
  $posts=Clients::where('tag_id', $par1)->orWhere('qr_code',$par1)->first();
  //$posts=mtncotumer::where('acti_id',$par1)->first();
  return $posts->name;
  }
}
