<?php

namespace App\Model;
use App\Model\Kids;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
  protected $fillable = [
      'name','ch_by','p_id', 'phone','ch','gender','tag_id','id','email','sh','qr_code','won','reg_by'
  ];

  public static function phoneinfo2($par1)
  {
    // $ph="234803200".$par1;
    $posts=Clients::where('tag_id', $par1)->orWhere('qr_code',$par1)->first();
  //$posts=mtncotumer::where('acti_id',$par1)->first();
  return $posts->phone;
  }

  public static function chinfo($par1)
  {
  $posts=User::where('id', $par1)->first();
  //$posts=mtncotumer::where('acti_id',$par1)->first();
  return $posts->name;
  }
  public static function nfo($par1)
  {
  $posts=Clients::where('tag_id', $par1)->orWhere('qr_code',$par1)->first();
  //$posts=mtncotumer::where('acti_id',$par1)->first();
  return $posts->name;
  }

  public static function usersinfo($par1)
  {
  $posts=Clients::where('tag_id', $par1)->orWhere('qr_code',$par1)->first();
  //$posts=mtncotumer::where('acti_id',$par1)->first();
  return $posts->name;
  }
  public function kids()
  {
      return $this->HasMany( Kids::class,'p_id','id');
  }

  public static function shuffle(){
    $lucky = self::awoofers();
    $lucky->hasWon();
    return $lucky;
  }

  public function hasWon(){
    $this->won = true;
    return $this->save();
  }

  public static function winner($key){
    $ticket = Clients::where('qr_code', $key)->first();
    if ($ticket) {
      return $ticket->hasWon();
    }
    return false;
  }

  public static function lucks(){
    return self::where('won', false)->inRandomOrder()->limit(100)->get();
  }

  public static function awoofers(){
    return self::where('won', false)->inRandomOrder()->first();
  }

  public static function pending(){
    return self::where('won', false)->get();
  }

}
