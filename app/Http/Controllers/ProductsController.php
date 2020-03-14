<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;
use App\Model\Client_Accounts;
use App\Model\transcations;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
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


    public function index()
    {
      //  $products = Product::all();
        $products = Product::where('vendor_id','=',Auth::user()->id)->get();

        return view('products', compact('products'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkOUT(Request $request)
    {
      $this->validate($request, [
      'amount' => 'required|string|max:255',
      'id' => 'required|string|max:255',
      'balance' => 'required|string|max:255',
     ]);

     if($request->get('balance') < $request->get('amount'))
     {

    $sum=$request->get('balance') - $request->get('amount');
       Session::flash('alert-class', 'alert-danger');
       $message = 'Insufficient funds ! Balance is '.$request->get('balance').' Please Top Up '.$sum.'';
       return redirect()->back()->with('message', $message);
     }
     else
     {
          $cart = session()->get('cart');
             $value = $request->session()->pull('cart');
        //    dd($value);
           $sum=$request->get('balance') - $request->get('amount');
           $items = Client_Accounts::where('tag_id', $request->get('id'))
                     ->update(['balance' => $sum]);
                           foreach($value as $id => $details)
                           {
                             $itemd =transcations::create(array(
                                        'user_id' => $request->get('id'),
                                         'vendor_id' =>Auth::user()->id,
                                         'total_amount' => $request->get('amount'),
                                         'items' => $details['name'],
                                         'quqntity'  =>$details['quantity'],
                                         'item_price' => $details['price'],

                                        ));
                                //       dd($details['key']["quantity"] );
                           }

                      unset($value);
                         session()->forget('key');

    Session::flash('alert-class', 'alert-success');
   $message = 'Transcation successfully! New Balance is '.$sum.'';
       return redirect()->back()->with('message', $message);
     }



    }

    public function ViewSales()
    {
      $posts=transcations::where('vendor_id','=',Auth::user()->id)->get();

        return view('pages.ViewSales')->with('posts', $posts);
    }
}
