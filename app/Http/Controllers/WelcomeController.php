<?php

namespace App\Http\Controllers;
use App\Model\Clients;
use App\Model\Kids;
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

class WelcomeController extends Controller
{


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


}
