<?php

namespace App\Http\Controllers;
use App\Model\Clients;
use App\Model\Kids;
use App\Model\client_child;
use App\Model\Checkin;
use App\Model\Iv_Checkin;
use App\Model\bulkemails;
use App\Model\Activities;
use App\Mail\MailMember2;
use App\Model\mtncotumer;
use App\Model\Vendor_food;
use App\User;
use App\Product;
use Auth;
use Session;
use App\Model\Top_Ups;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Model\Client_Accounts;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  //return view('pages.self');
       return view('welcome');
    }

    public function dashboard()
    {
        return view('dashboard');
    }


    public function index2()
    {
        return view('home');
    }
    public function Ticketvusers()
    {
       $posts=  bulkemails::where('CUSTOMER_NAME', '!=' ,'NULL' )->get();
     // $posts=  bulkemails::all();
        return view('pages.tvusers')->with('posts', $posts);
    }
    public function ed()
    {
      $posts=  Top_Ups::where('staff','=',Auth::user()->name)->get();
       return view('pages.export_top' , compact('posts', $posts));

    }

    public function totops()
    {
      $posts=  Top_Ups::where('staff','=',Auth::user()->name)->get();
       return view('pages.total_top' , compact('posts', $posts));

    }

    public function cregister()
    {
        return view('cregister');
    }
    public function Raffle()
    {
      return view('pages.raffle');
    }

    public function Ticketemail()
    {
      return view('pages.temail');
    }

    public function TicketvalmT()
    {
        return view('pages.tvemail');
    }
    public function sq()
    {
      return view('pages.scancode');
    }

    public function room()
    {
      return view('pages.room');
    }

    public function reg_all()
    {
     return view('auth.register');
    }

    public function gt()
    {
       $posts= Clients::all();
      // dd($posts);
        return view('pages.gt' , compact('posts', $posts));
    }

    public function registerff(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|string|max:255',
          'phone_no' => 'required',
          'Role' => 'required',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',

      ]);
     User::create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'phone' => $request->get('phone_no'),
          'is_permission' =>$request->get('Role'),
          'password' => bcrypt($request->get('password')),
      ]);
      $message = 'Post has been successfully added!';
      return redirect()->back()->with('status', $message);
    }
public function createfood()
{
  $TICKECT=User::where('is_permission','=','3')->get();

    return view('pages.createfood',compact('TICKECT',$TICKECT));
}

public function updatefood()
{
  $TICKECT=User::where('is_permission','=','3')->get();

    return view('pages.updatefood',compact('TICKECT',$TICKECT));
}



public function upfetchac(Request $request)
{
    $TICKECT=User::where('is_permission','=','3')->get();
     $posts=Product::where('vendor_id', $request->get('vac'))->get();
     //dd($posts);
return view('pages.updatefood',compact('posts',$posts,'TICKECT',$TICKECT));
}

public function createvendorFood(Request $request)
	{
		if (!is_array($request->subname) || !is_array($request->price)) {
			dd('Form tampering or CSRF suspected');
		}

		if (
			(count($request->subname) != count($request->price))
		) {
			dd('Suspected CSRF of Javascript failure');
		}

		for ($i = 0; $i < count($request->subname); $i++) {
			$post = Product::create(array(
				'vendor_id' => $request->ac,
				'name' => $request->subname[$i],
				'price' => $request->price[$i],
        'description'=> $request->description[$i]
				// 'available_from'      =>    $request->event_id,
				// 'available_to'=>        $request->event_id
				// 'author' => Auth::user()->id
			));
		}



		$message = 'Post has been successfully added!';
		return redirect()->back()->with('status', $message);
	}


  public function up($request)
  {
    $data=Product::where('id', $request)->get();
    // dd($request);
  //   foreach($request['email_data'] as $row)
  // 	{
  // // echo $row['food_name'].'<br>';
  // // echo $row['price'].'<br>';
  // // echo $row['vendor_id'].'<br>';
  // // echo $row['uid'].'<br>';
  //
  // $data = array(
  //                    'reg' =>$row['food_name'],
  //                       'q1'=>$row['price'],
  //                     'q2'=>$row['vendor_id'],
  //                       'q3'=>$row['uid']
  //
  //                   );
  //
  //   }
         return view('pages.update_top' , compact('data', $data));

  }

public function update_vendor_food(Request $request)
{
  $items = Product::where('id', $request->get('id'))
            ->update(['name' => $request->get('subname'),'description' => $request->get('description'),'price' => $request->get('price')]);
            $TICKECT=User::where('is_permission','=','3')->get();
             $posts=Product::where('id', $request->get('id'))->get();
  $status ='Update is successfully Thank You .....!';
     return view('pages.updatefood', compact('posts',$posts,'status', $status,'TICKECT',$TICKECT));
}

    public function checkout(Request $request)
    {

   $vpos=Clients::where('tag_id','=',$request->get('qrcode'))->first();
       $vposts=Client_Accounts::where('tag_id','=',$request->get('qrcode'))->first();
    $posts=$vposts->balance;
    $ids=$request->get('qrcode');
// dd($ids);
    if($posts){
      $message=''.$vpos->name.' Your Balance is N'.$posts.' !';
//       Session::flash('message', ''.$vpos->name.' Your Balance is N'.$posts.' !');
// Session::flash('alert-class', 'alert-success');
        // $message = 'Post has been successfully added!';
    //  return view('cart' , compact('posts', $posts,'ids', $ids));
    return response()->json([
       'error' => '0',
       'status'  => $message,
       'sid'  => $ids,
       'balance'  => $posts,
    ], 200);

    }
    else
    {

      $message ='Hello Ticket Number '.$request->get('qrcode').' is Invalide Or is yet to Top Up    Thank You .....!';

                    return response()->json([
                         'error' => '1',
                         'status'  => $message,
                     ], 200);
//       Session::flash('message', 'Invalide Ticket !');
// Session::flash('alert-class', 'alert-danger');
//
//     return view('cart' , compact('posts', $posts,'ids', $ids));

    }



      return redirect()->back()->with('status', $message);
    }

    public function checkin(Request $request)
  {
      $this->validate($request, [
        'name' => 'required|string|max:255',
         'id' => 'required',

    ]);

    $itemsf = Clients::where('id',$request->id)
         ->where('name',$request->name)
         // ->orWhere('qr_code',$request->name)
         ->update(['ch' => 1,'ch_by' =>Auth::user()->id]);

         $message ='ok';

       return response()->json([
          'error' => '1',
          'status'  => $message,
       ], 200);



  }

  public function childguest()
  {
     $posts= client_child::all();

       return view('pages.childattendance')->with('posts', $posts);
  }

  public function valguest()
  {
     $posts= Clients::where('ch','=',1)->get();

       return view('pages.validattendance')->with('posts', $posts);
  }

public function questmtncos(Request $request)
{
  $this->validate($request, [
  'name' => 'required|string|max:255',
  'agency_didwell' => 'required|string|max:255',
  'ent_rating' => 'required|string|max:255',
  'enjoy_galanight' => 'required|string|max:255',
  'enjoy_session' => 'required|string|max:255',
 ]);
  $ph="234803200".$request->get('name');
 $rew2w=DB::table('questionnaire')->where('phone',$ph)->first();
if($rew2w)
{

  $rew2=DB::table('mtncotumers')->where('ivcode', $request->get('name'))->orWhere('phone',$ph)->first();
$message ='Hello '.$rew2->name.' already answer questionnaire .....!';

return response()->json([
  'error' => '1',
  'status'  => $message,
], 200);
}else{

     $rew2=DB::table('questionnaire')->where('reg',$request->get('name'))->first();
   if($rew2)
   {
       $ph="234803200".$request->get('name');
       $rew2=DB::table('mtncotumers')->where('ivcode', $request->get('name'))->orWhere('phone',$ph)->first();
     $message ='Hello '.$rew2->name.' You Already  Registered Thank You .....!';

   return response()->json([
      'error' => '1',
      'status'  => $message,
   ], 200);
   }else{
      $ph="234803200".$request->get('name');
       $rew2=DB::table('mtncotumers')->where('ivcode', $request->get('name'))->orWhere('phone',$ph)->first();
if($rew2)
{
$na=$rew2->name;
}
else{
$na =$ph;
}
     $data = array(
                        'reg' =>$na,
                           'q1'=>$request->get('agency_didwell'),
                         'q2'=>$request->get('ent_rating'),
                           'q3'=>$request->get('enjoy_galanight'),
                           'q4'=>$request->get('enjoy_session'),
                           'phone'=>$ph

                       );
                       $rew2=DB::table('questionnaire')->insert($data);
                       if($rew2)
                       {
 $rew2=DB::table('mtncotumers')->where('ivcode', $request->get('name'))->orWhere('phone',$ph)->first();
                             $message ='Hello '.$rew2->name.'    Thank You .....!';

                                           return response()->json([
                                                'error' => '0',
                                                'status'  => $message,
                                            ], 200);
                       }
                       else{
                         $message ='Sorry Something Went Wrong Please Try Again Thank You .....!';

                       return response()->json([
                          'error' => '1',
                          'status'  => $message,
                       ], 200);
                       }



   }


}
}

public function validatescanroom(Request $request)
{

  $this->validate($request, [
  'qrcode' => 'required',
  'key' => 'required',

 ]);
$Existsc=mtncotumer::where('ivcode', $request->get('qrcode'))->exists();
  if(!$Existsc)
  {

    // $itemd =  mtncotumer::create(array(
    //            'CUSTOMER_NAME' =>'NULL',
    //             'PHONE' =>'NULL',
    //             'EMAIL' => 'NULL',
    //             'TICKET_CATEGORY' => 'NULL',
    //             'STATUS_SentUnsent'  =>1,
    //             'ivcode' => $request->get('qrcode'),
    //              'attend' =>1,
    //
    //            ));

          $message ='Tag Id Is Invalide Thank You.....!';

        return response()->json([
           'error' => '1',
           'status'  => $message,
        ], 200);
  }else {
     $Exists=mtncotumer::where('ivcode', $request->get('qrcode'))->first();
     if ($Exists) {
       $items = mtncotumer::where('ivcode', $request->get('qrcode'))
                 ->update(['room' => $request->get('key')]);

       $message ='Ticket has been successfully Validated Thank You .....!';

   return response()->json([
        'error' => '0',
        'status'  => $message,
    ], 200);
     }
     else{

       $message ='Room Already Assigned! .....!';

   return response()->json([
        'error' => '1',
        'status'  => $message,
    ], 302);

     }
     }





}



public function create_activi(Request $request)
{
  if (!is_array($request->subname) ) {
    dd('Form tampering or CSRF suspected');
  }


  for ($i = 0; $i < count($request->subname); $i++) {
     $order_id = mt_rand(13, rand(99, 99999));
    $post = Activities::create(array(
      'acti_id' => $order_id,
      'name' => $request->subname[$i]
    ));
  }

  $message = 'Post has been successfully added!';
  return redirect()->back()->with('status', $message);
}


public function validatescanQrcode(Request $request)
{
  // $filenamewithextension = $request->file('attachment')->getClientOriginalName();
  // dd($filenamewithextension);
  $this->validate($request, [
  'qrcode' => 'required',

 ]);

 $ro=$request->get('rg');
 if($ro =="")
 {
 $wre='0';
 }
 else
 {
$wre=$request->get('rg');
 }

    $reg22="234803200".$request->get('qrcode');
//dd($wre);
$Existsc=mtncotumer::where('ivcode', $request->get('qrcode'))->orWhere('phone', $reg22)->exists();
  if(!$Existsc)
  {

    // $itemd =  mtncotumer::create(array(
    //            'CUSTOMER_NAME' =>'NULL',
    //             'PHONE' =>'NULL',
    //             'EMAIL' => 'NULL',
    //             'TICKET_CATEGORY' => 'NULL',
    //             'STATUS_SentUnsent'  =>1,
    //             'ivcode' => $request->get('qrcode'),
    //              'attend' =>1,
    //
    //            ));

          $message ='Ticket Invalide and  was unsuccessfully Validated Thank You.....!';

        return response()->json([
           'error' => '1',
           'status'  => $message,
        ], 200);
  }else {




     $Exists=mtncotumer::where('ivcode', $request->get('qrcode'))->orWhere('phone', $reg22)->first();
     if ($Exists) {

       $items = mtncotumer::where('ivcode', $request->get('qrcode'))->orWhere('phone', $reg22)
                 ->update(['reg' => $wre,'ch'=>'1']);

       $message ='Hello '.$Exists->name.' Ticket has been successfully Validated Thank You your qrcode is '.$Exists->ivcode.' and your group is '.$Exists->platoon.'';

   return response()->json([
        'error' => '0',
        'status'  => $message,
    ], 200);
     }
     else{

       $message ='Ticket Already Assigned! .....!';

   return response()->json([
        'error' => '1',
        'status'  => $message,
    ], 302);

     }
     }



}

    public function validateMQrcode(Request $request)
    {
      $this->validate($request, [
      'qrcode' => 'required|string|max:255',

     ]);
 $Existsc=bulkemails::where('ivcode', $request->get('qrcode'))->exists();
      if(!$Existsc)
      {

        $itemd =  bulkemails::create(array(
                   'CUSTOMER_NAME' =>'NULL',
                    'PHONE' =>'NULL',
                    'EMAIL' => 'NULL',
                    'TICKET_CATEGORY' => 'NULL',
                    'STATUS_SentUnsent'  =>1,
                    'ch_by' =>Auth::user()->id,
                    'ivcode' => $request->get('qrcode'),
                     'attend' =>1,

                   ));

              $message ='Ticket has been successfully Validated Thank You.....!';

            return response()->json([
               'error' => '0',
               'status'  => $message,
            ], 200);
      }else {
         $Exists=bulkemails::where('attend', '=' ,'0' )->where('ivcode', $request->get('qrcode'))->first();
         if ($Exists) {
           $items = bulkemails::where('ivcode', $request->get('qrcode'))
                     ->update(['attend' =>1,'ch_by' =>Auth::user()->id]);

           $message ='Ticket has been successfully Validated Thank You .....!';

       return response()->json([
            'error' => '0',
            'status'  => $message,
        ], 200);
         }
         else{

           $message ='Ticket Already Assigned! .....!';

       return response()->json([
            'error' => '1',
            'status'  => $message,
        ], 302);

         }
        }



  //dd($request->get('qrcode'));

    }

    public function findparent(Request $request)
    {

         $posts=Product::where('vendor_id', $request->get('vac'))->get();
         //dd($posts);
    return view('pages.findparent',compact('posts',$posts));
    }

    public function findQrcode(Request $request)
    {
      $this->validate($request, [
      'qrcode' => 'required|string|max:255',

     ]);
 $Existsc=client_child::where('qrcode', $request->get('qrcode'))->exists();

      if(!$Existsc)
      {
              $message ='Ticket Invalide.....!';

            return response()->json([
               'error' => '1',
               'status'  => $message,
            ], 302);
      }else {
         $Existsc=client_child::where('qrcode', $request->get('qrcode'))->first();
//dd();
         $Exists=Clients::where('tag_id', $Existsc['parent_qrcode'])->first();
         return response()->json([
            'error' => '1',
            'status'  => $Exists,
         ], 302);
         }
    }


    public function validateQrcode(Request $request)
    {
      $this->validate($request, [
      'qrcode' => 'required|string|max:255',

     ]);
 $Existsc=bulkemails::where('ivcode', $request->get('qrcode'))->exists();
      if(!$Existsc)
      {
              $message ='Ticket Invalide.....!';

            return response()->json([
               'error' => '1',
               'status'  => $message,
            ], 302);
      }else {
         $Exists=bulkemails::where('attend', '=' ,'0' )->where('ivcode', $request->get('qrcode'))->first();
         if ($Exists) {
           $items = bulkemails::where('ivcode', $request->get('qrcode'))
                     ->update([ 'attend' =>1,'ch_by' =>Auth::user()->id]);

           $message ='User has been successfully Validated Thank You .....!';

       return response()->json([
            'error' => '0',
            'status'  => $message,
        ], 200);
         }
         else{

           $message ='Ticket Already Assigned! .....!';

       return response()->json([
            'error' => '1',
            'status'  => $message,
        ], 302);

         }
         }



  //dd($request->get('qrcode'));

    }


    public function valchechingiv2(Request $request)
    {
      $this->validate($request, [
      'name' => 'required',
      'og' => 'required',

     ]);
     $items2 =  Checkin::create(array(
                'acti_id' =>$request->get('ac'),
                 'reg' =>$request->get('name'),
                  'phone' =>$request->get('name'),
                  'og' =>$request->get('og'),
                   'code' =>'000000',
                 'groups' => 'Partners',

                ));

$message =$request->get('name').' Welcome .....!';

return response()->json([
'error' => '0',
'status'  => $message,
], 200);
    }

    public function valcheching(Request $request)
    {
      $this->validate($request, [
      'qrcode' => 'required',
      'ac' => 'required',

     ]);
     $reg22="234803200".$request->get('qrcode');
 //dd($wre);

     $Existsc=Checkin::where('reg', $request->get('qrcode'))->where('acti_id', $request->get('ac'))->exists();

          if(!$Existsc)
          {
if($request->get('iv') =="iv")
{
  // $items2 =  Iv_Checkin::create(array(
  //            'acti_id' =>$request->get('ac'),
  //             'reg' =>$request->get('qrcode'),
  //
  //            ));

             $items2 =  Checkin::create(array(
                        'acti_id' =>$request->get('ac'),
                         'reg' =>$request->get('qrcode'),
                          'phone' =>$request->get('phone'),
                          'og' =>$request->get('og'),
                           'code' =>'000000',
                         'groups' => 'Partners',

                        ));

  $message =$request->get('qrcode').' Welcome .....!';

return response()->json([
   'error' => '0',
   'status'  => $message,
], 200);


}
else{

  // $Existscgg=mtncotumer::where('ivcode', $request->get('qrcode'))->orWhere('phone', $reg22)->exists();
  // if($Existscgg)
  // {
     $t=$request->get('qrcode');
if($t =='0')
{
  $reg="1010100";
//  dd($reg);
}else {
    $reg=$request->get('qrcode');
    //  dd($reg);
}


     $Existsc=mtncotumer::where('ivcode', $request->get('qrcode'))->orWhere('reg', $reg)->orWhere('phone', $reg22)->exists();
       if(!$Existsc)
       {

         $message ='Tag Id Is Invalide Thank You.....!';

       return response()->json([
          'error' => '1',
          'status'  => $message,
       ], 200);
 }
 else {
    $Exists=mtncotumer::where('ivcode', $request->get('qrcode'))->orWhere('reg', $reg)->orWhere('phone', $reg22)->first();
    if($Exists->ch !='1')
    {
     //  $ro=$request->get('rg');
     //  if($ro =="")
     //  {
     //  $wre='0';
     //  }
     //  else
     //  {
     // $wre=$request->get('rg');
     //  }

      $items = mtncotumer::where('ivcode', $request->get('qrcode'))->orWhere('phone', $reg22)
                ->update(['ch'=>'1']);

                $items2 =  Checkin::create(array(
                           'acti_id' =>$request->get('ac'),
                            'reg' =>$request->get('qrcode'),
                            'groups' => $Exists->platoon,

                           ));

                $message =$Exists->name.' Welcome .....!';

            return response()->json([
                 'error' => '0',
                 'status'  => $message,
             ], 200);

    //   $message ='Tag Id Is Yet To Checkin.....!';
    //
    // return response()->json([
    //    'error' => '1',
    //    'status'  => $message,
    // ], 200);
    }
    else{


      $items =  Checkin::create(array(
                 'acti_id' =>$request->get('ac'),
                  'reg' =>$request->get('qrcode'),
                  'groups' => $Exists->platoon,

                 ));

      $message =$Exists->name.' Welcome .....!';

  return response()->json([
       'error' => '0',
       'status'  => $message,
   ], 200);

  }
    }


    //}
    // else {
    //   $message ='Tag Id Is Not Register And Dose Not Have  A Qrcode Thank You.....!';
    //
    // return response()->json([
    //    'error' => '1',
    //    'status'  => $message,
    // ], 200);
    // }

}
}
else {
  $message ='Ticket Already Assigned! .....!';

return response()->json([
   'error' => '1',
   'status'  => $message,
], 302);
}






    }

    public function creg(Request $request)
    {
      $this->validate($request, [
      'name' => 'required|string|max:255',
      'phone_no' =>['required','numeric','min:0'],
      'gender' => 'required|string|max:255',
      'qr_code' =>'required|string|max:255',

  ]);

  // $validator = Validator::make($request->input(), array(
  //   'name' => 'required|string|max:255',
  //   'phone_no' =>['required','numeric','min:0'],
  //   'gender' => 'required|string|max:255',
  //   'qr_code' =>'required|string|max:255',
  //       ));
  //
  //       if ($validator->fails()) {
  //           return response()->json([
  //               'error'    => true,
  //               'messages' => $validator->errors(),
  //           ], 422);
  //       }

   $user_id = mt_rand(13, rand(100, 99999990));
   $items =  Clients::create(array(
              'name' =>$request->get('name'),
               'phone' =>$request->get('phone_no'),
               'gender' => $request->get('gender'),
               'tag_id' => $request->get('qr_code'),
               'p_id'  =>$user_id,
              ));

              $it =  Client_Accounts::create(array(
                         'balance' =>0,
                          'p_id'  =>$user_id,
                           'tag_id' => $request->get('qr_code')
                         ));


              if (!is_array($request->kd) || !is_array($request->kt)) {
            			dd('Form tampering or CSRF suspected');
            		}

            		if (
            			(count($request->kd) != count($request->kt))
            		) {
            			dd('Suspected CSRF of Javascript failure');
            		}

            		for ($i = 0; $i < count($request->kd); $i++) {
            			$post = Kids::create(array(
            				'p_id' => $user_id,
            				'name' => $request->kd[$i],
            				'tag_id' => $request->kt[$i]
            			));
            		}




              $message ='User has been successfully Registered Thank You .....!';
     return redirect()->back()->with('status', $message);
     // return response()->json([
     //           'error' => false,
     //           'status'  => $message,
     //       ], 200);


    }

    public function tEmail(Request $request)
{
  if(isset($request['email_data']))
{
//  2348032000513
//dd($request[email_data]);
  foreach($request['email_data'] as $row)
	{
// echo $row['phone'].'<br>';
// echo $row['name'].'<br>';
// echo $row['ivcode'].'<br>';
// echo $row['email'].'<br>';

$str =$row['phone'];
$n=4;
$strat=strlen($str)-$n;
$r=substr($str,$strat);


// $Existsc = DB::table('checkins')
//         ->select('checkins.groups')
//         ->groupBy('groups')
//         ->where('reg', $row['ivcode'])
//         ->orWhere('reg', $r)
//         ->get();
$Existsc=Checkin::where('reg', $row['ivcode'])->orWhere('reg', $r)->get();
// //dd($Existsc);
// foreach($Existsc as $value)
// {
// // print_r($value);
//  echo $value->acti_id.' <br>';
// //print_r($value['acti_id']);
// }


//  //echo $request->email_data[0];
// //   $this->validate($request->all(), [
// //     'name' => 'required|string|max:255',
// //     'email' => 'required|string|max:255',
// //
// // ]);
//
//
//   $rand=rand(100,9999);
//   $t=$rand;
//     // $number = rand(100,1000);
//     // $t=time();
//     // $rand = $number.''.$t;
//     $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
//                 ->format('png')->size(800)
//                 ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
//   // $qrCode=\QrCode::size(1000)
//   //   ->format('png')
//   //   ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
//     $img =public_path().'/qrcode/'.$rand.'_qrcode.png';


$c_message =  '<p>Hi,</p>
<p>Thanks for registering to attend Edu360, powered by Union Bank!</p>
<p>The 3-day event themed "Education beyond walls" will hold on October 24th-26th, 2019 from 9:00am to 5:00pm each day.</p>
<p> Venue : Union Bank Sport Club, Bode Thomas Street Surulere, Lagos</p>
<p> At Edu360, there will be a range of activities for you to experience, including exhibition, panel, workshop,training as well as fun and educational activities for students. Get ready to meet and network with other parents, learn from expert and enjoy informative sessions!</p>
'.$row['name'].'

<p>Attached is your ticket for updates:</p>
<p> Join the conversation using the hashtag #edu360 Tweet to @unionbank_ng</br> <p>Look out for more information on edu360.ng</p></br>
 <p> If you have any question leading up to the event, you can send us mail at  edu360@unionbankng.com</p></br>
<p>We look forward to welcoming you!</p></br>
<p>Regards</P> </br>
<p>Kelechi </p>
<p>Kindly confirm invite below and provide attached QR code or use invite code <br /><b style="font-size: 30px">'.$row['name'].'</b>at the event point of entry.</p> ';
//dd($request->name.'_'.$rand);
$img2 =public_path().'/img/Picture1.jpg';
    $img3 =public_path().'/img/mtn/favicon-32x32.png';
$data = array(
  'name' => $row["name"],
     'email'=>$row["email"],
   'contactSubject'=>$contactSubject,
     'messagetext'=>$c_message,
     'images'=>$img,
     'app_name' => config('app.name'),
     'img' => $img2,
     'img3' => $img3

                );

           Mail::send('mails.name',  ['data'=>$data,'hr'=>$Existsc], function ($message) use ($data){

             $to_email =$data['email'];
             $to_name  =$data['name'];
             $message->sender('tickets@wristbands.ng', 'Merrybet Celebrity Fans Challenge!');
             $message->replyTo('tickets@wristbands.ng', 'Merrybet Celebrity Fans Challenge!');
               $message->from('tickets@wristbands.ng', 'Merrybet Celebrity Fans Challenge!');
             $message->subject('Merrybet Celebrity Fans Challenge!');
              $message->bcc("kennygendowed@gmail.com");
       // $message->cc("celebrityfcng@gmail.com");
       // $message->cc("clipsemgt@gmail.com");
      // dd($to_email);
                $message->to($to_email, $to_name);
           });

    if(count(Mail::failures()) > 0){
        $status = 'Error something Went Wrong';
        dd("error");
    } else {
       // $items = bulkemails::where('EMAIL', $request->email)
       //           ->where('CUSTOMER_NAME',$request->name)->update([ 'STATUS_SentUnsent' =>1,
       //             'ivcode' => $t
       //          ]);
       //



        $message = 'Mail Sent Successfully Thank You ....';
    }

    return response()->json([
         'error' => '0',
         'status'  => $message,
     ], 200);
//       echo json_encode($status);
// exit;

// return redirect()->back()->with('status', $status );



  }

}
}


    public function sendbulkEmail(Request $request)
      {
        $this->validate($request, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|max:255',
          'phone_no' =>['required','numeric','min:0'],
          'ticket' => 'required|string|max:255',

      ]);


              // if($items->exists)
              // {

                $rand=rand(100,9999);
                $t=$rand;
                  // $number = rand(100,1000);
                  // $t=time();
                  // $rand = $number.''.$t;
                  $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
                              ->format('png')->size(800)
                              ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                // $qrCode=\QrCode::size(1000)
                //   ->format('png')
                //   ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                  $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
          $contactSubject = 'Merrybet celebrity fans Challenge! ';

            $c_message =  '<p>Hi,</p>
              <p>Thanks for registering to attend Edu360, powered by Union Bank!</p>
              <p>The 3-day event themed "Education beyond walls" will hold on October 24th-26th, 2019 from 9:00am to 5:00pm each day.</p>
              <p> Venue : Union Bank Sport Club, Bode Thomas Street Surulere, Lagos</p>
              <p> At Edu360, there will be a range of activities for you to experience, including exhibition, panel, workshop,training as well as fun and educational activities for students. Get ready to meet and network with other parents, learn from expert and enjoy informative sessions!</p>
              '.$qrCode.'

              <p>Attached is your ticket for updates:</p>
              <p> Join the conversation using the hashtag #edu360 Tweet to @unionbank_ng</br> <p>Look out for more information on edu360.ng</p></br>
               <p> If you have any question leading up to the event, you can send us mail at  edu360@unionbankng.com</p></br>
              <p>We look forward to welcoming you!</p></br>
              <p>Regards</P> </br>
              <p>Kelechi </p>
              <p>Kindly confirm invite below and provide attached QR code or use invite code <br /><b style="font-size: 30px">'.$qrCode.'</b>at the event point of entry.</p> ';
          //dd($request->name.'_'.$rand);
              $img2 =public_path().'/img/new-logo.png';
            $data = array(
                               'name' => $request->name,
                                  'email'=>$request->email,
                                'contactSubject'=>$contactSubject,
                                  'messagetext'=>$c_message,
                                  'images'=>$img,
                                  'ran'=>$rand,
                                  'app_name' => config('app.name'),
                                  'qrCode'    =>$rand,
                                  'img' => $img2,
                                  'ct'=> $request->ct

                              );
                         //     dd($data);
                         Mail::send('mails.bulk2', $data, function ($message) use ($request){

                           $to_email = $request->email;
                           $to_name  = $request->name;
                           $subject  = $request->contactSubject;
                           $message->sender('tickets@wristbands.ng', 'Merrybet Celebrity Fans Challenge!');
                           $message->replyTo('tickets@wristbands.ng', 'Merrybet Celebrity Fans Challenge!');
                             $message->from('tickets@wristbands.ng', 'Merrybet Celebrity Fans Challenge!');
                           $message->subject('Merrybet Celebrity Fans Challenge!');
                            $message->bcc("kennygendowed@gmail.com");
                      // $message->bcc("celebrityfcng@gmail.com");
                      //   $message->bcc("clipsemgt@gmail.com");
                              $message->to($to_email, $to_name);
                         });

                  if(count(Mail::failures()) > 0){
                      $status = 'Error something Went Wrong';
                      dd("error");
                  } else {


                          $item =  bulkemails::create(array(
                                     'CUSTOMER_NAME' =>$request->get('name'),
                                      'PHONE' =>$request->get('phone_no'),
                                      'EMAIL' => $request->get('email'),
                                      'TICKET_CATEGORY' => $request->get('ticket'),
                                      'STATUS_SentUnsent'  =>0,
                                       'ch_by' => Auth::user()->id,
                                       'ivcode' => 0,

                                     ));

                     $items = bulkemails::where('EMAIL', $request->email)
                               ->where('CUSTOMER_NAME',$request->name)->update([ 'STATUS_SentUnsent' =>1,
                                 'ivcode' => $t
                              ]);



                    //  $status = 'Mail Sent Successfully Thank You ....';
                  }



                    $message ='User has been successfully Registered Thank You .....!';

                return response()->json([
                     'error' => '0',
                     'status'  => $message,
                 ], 200);

              // }
              // else {
              //
              //       $message ='Sorry Please Try Again  .....!';
              //
              //   return response()->json([
              //        'error' => '1',
              //        'status'  => $message,
              //    ], 500	);
              // }


      //       echo json_encode($status);
      // exit;

  // return redirect()->back()->with('status', $status );



      }


      public function creg2(Request $request)
      {
        $this->validate($request, [
        'name' => 'required|string|max:255',
        'phone_no' =>['required','numeric','min:0'],
        'gender' => 'required',
        'qr_code' => 'required|string|max:255',


    ]);


  $check = Clients::where('tag_id', '=' , $request->get('qr_code'))->exists();
  if($check){
    $message ='Something went wrong. Wristband Id Already Registered Thank You .....!';
  return redirect()->back()->with('status', $message);
  // return response()->json([
  //    'error' => '1',
  //    'status'  => $message,
  // ], 200);
  }
  else {
    $user_id = mt_rand(13, rand(100, 99999990));
    $items =  Clients::create(array(
               'name' =>$request->get('name'),
                'phone' =>$request->get('phone_no'),
                'gender' => $request->get('gender'),
                'email' => $request->get('email'),
                'sh'  =>$request->get('sh'),
                'reg_by' => Auth::user()->id,
                 'qr_code' => 0,
                 'p_id' => 0,
                 'tag_id' => $request->get('qr_code')
               ));
               Client_Accounts::create(array(
                          'p_id' =>Auth::user()->id,
                           'tag_id' => $request->get('qr_code'),
                           'balance'=> 0,
                          ));

               $message ='User has been successfully Registered Thank You .....!';
      return redirect()->back()->with('status', $message);

  //     $message ='User has been successfully Registered Thank You .....!';
  //
  // return response()->json([
  //      'error' => '0',
  //      'status'  => $message,
  //  ], 200);
  }




      }




    public function creg22(Request $request)
    {
      $this->validate($request, [
      'name' => 'required|string|max:255',
      'phone_no' =>['required','numeric','min:0'],
      'gender' => 'required|string|max:255',
      'qr_code' => 'required|string|max:255',


  ]);


  // $validator = Validator::make($request->input(), array(
  //   'name' => 'required|string|max:255',
  //   'phone_no' =>['required','numeric','min:0'],
  //   'gender' => 'required|string|max:255',
  //   'qr_code' =>'required|string|max:255',
  //       ));
  //
  //       if ($validator->fails()) {
  //           return response()->json([
  //               'error'    => true,
  //               'messages' => $validator->errors(),
  //           ], 422);
  //       }
//
// $check = Clients::where('tag_id', '=' , $request->get('qr_code'))->exists();
// if($check){
//   $message ='Something went wrong. Wristband Id Already Registered Thank You .....!';
//
// return response()->json([
//    'error' => '1',
//    'status'  => $message,
// ], 200);
// }
// else {
  $user_id = mt_rand(13, rand(100, 99999990));
  $items =  Clients::create(array(
             'name' =>$request->get('name'),
              'phone' =>$request->get('phone_no'),
              'gender' => $request->get('gender'),
              'email' => $request->get('email'),
              'sh'  =>$request->get('sh'),
              'reg_by' => Auth::user()->id,
               'qr_code' => $request->get('dp'),
               'p_id' => 0,
               'tag_id' => $request->get('qr_code')
             ));

             for ($i = 0; $i < count($request->childname); $i++) {
         			$post = client_child::create(array(
         				'parent_qrcode' => $request->get('qr_code'),
         				'name' => $request->childname[$i],
         				'qrcode' => $request->childqrcode[$i],
                	'reg_by' => Auth::user()->id
         				// 'available_from'      =>    $request->event_id,
         				// 'available_to'=>        $request->event_id
         				// 'author' => Auth::user()->id
         			));
         		}



if($items){
  $message ='User has been successfully Registered Thank You .....!';
return redirect()->back()->with('status', $message);
}
else {
  $message ='Something went wrong. Please try again Thank You .....!';
return redirect()->back()->with('status', $message);
}

    //          $message ='User has been successfully Registered Thank You .....!';
    // return redirect()->back()->with('status', $message);

    $message ='User has been successfully Registered Thank You .....!';
return redirect()->back()->with('status', $message);
// return response()->json([
//      'error' => '0',
//      'status'  => $message,
//  ], 200);
// }




    }

    public function  vendor()
    {
        return view('products');
    }

}
