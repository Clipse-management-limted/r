<?php

namespace App\Http\Controllers;
use App\Model\Clients;
use App\Model\Kids;
use App\Model\Top_Ups;
use App\Model\Client_Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{

  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


  public function topup()
  {
    return view('pages.topup');
  }

  public function ctop(Request $request)
  {
    $this->validate($request, [
    'amount' =>['required','numeric','min:0'],
    'qr_code' =>'required',

  ]);
  $Exists=Clients::where('tag_id', $request->get('qr_code'))->orWhere('qr_code',$request->get('qr_code'))->exists();
     if(!$Exists){
    //   $user_id = mt_rand(13, rand(100, 99999990));
       Clients::create(array(
                  'name' =>$request->get('name'),
                   'tag_id' => $request->get('qr_code'),
                   'p_id'  =>0,
                   'reg_by' => Auth::user()->id
                  ));

      Client_Accounts::create(array(
        'balance' =>$request->get('amount'),
         'p_id'  => Auth::user()->id,
          'tag_id' => $request->get('qr_code')
                 ));

      Top_Ups::create(array(
                 'staff' =>Auth::user()->name,
                  'tag_id' => $request->get('qr_code'),
                  'amount'=> $request->get('amount'),
                 ));

     }
     else {
$ba = Client_Accounts::where('tag_id',  $request->get('qr_code'))->first();
$balance=$ba->balance + $request->get('amount');
        $items = Client_Accounts::where('tag_id', $request->get('qr_code'))
        ->update([ 'p_id'  => Auth::user()->id,'balance' =>$balance
       ]);
  //  ->updateOrCreate([ 'p_id'  => Auth::user()->id,'balance' =>$balance
          // ]);

          Top_Ups::create(array(
                     'staff' =>Auth::user()->name ,
                      'tag_id' => $request->get('qr_code'),
                      'amount'=> $request->get('amount'),
                     ));


     }

     $message ='Top Up successfully .....!';
   return redirect()->back()->with('status', $message);


  }
}
