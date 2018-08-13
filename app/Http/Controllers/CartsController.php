<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session ; 

use App\Product ; 

use App\Cart ; 
use App\Order ; 
use Auth ; 
use Stripe\Stripe ; 
use Stripe\Charge ; 

class CartsController extends Controller
{
  public function addProduct(Request $request,Product $product)
  {
    $oldCart = (Session::has('cart')) ? Session::get('cart') : null ; 
    $cart = new Cart($oldCart); 
    $cart->add($product);
      Session::put('cart',$cart); 
      //dd(Session::get('cart')); 
      Session::flash('success','you succesfully Add to Shopping Cart');

    return redirect()->back();
  }

  public function getReduceByOne($id)
  {
    $oldCart = (Session::has('cart')) ? Session::get('cart') : null ; 
    $cart = new Cart($oldCart); 
    $cart->ReduceByOne($id);
    // for cancel proccess "chackout" when remove all item from cart
      if(count($cart->items)>0)
        {
          Session::put('cart',$cart);
        }
        else{
          Session::forget('cart');
        };
    return redirect()->route('shopping.cart');
  }

  public function getRemoveItem($id)
  {
    $oldCart = (Session::has('cart')) ? Session::get('cart') : null ; 
    $cart = new Cart($oldCart);
    $cart->removeItem($id);
    // for cancel proccess "chackout" when remove all item from cart
        if(count($cart->items)>0)
        {
          Session::put('cart',$cart);
        }
        else{
          Session::forget('cart');
        }
    return redirect()->route('shopping.cart');
  }
  /// increse item 
  public function getAddItem($id)
  {
    $oldCart = (Session::has('cart')) ? Session::get('cart') : null ; 
    $cart = new Cart($oldCart);
    $cart->ADDByOne($id);
      Session::put('cart',$cart);
    return redirect()->route('shopping.cart');
  }
  ///
  public function show()
  {
    if(! Session::has('cart'))
      {
        //return view without data    
            return view('shop.cart') ; 
      }

        //feth the cart 

        $cart = Session::get('cart');

        //fetch items from the cart 

        $products = $cart->items ; 


        //fetch the total price 

        $totalPrice = $cart->totalPrice ; 

        //return view with the passed data 

       // dd($products);
      return view('shop.cart',compact(['products','totalPrice']));
    }

  public function checkout()
  {
    if(!Session::has('cart'))
      {
         return redirect()->route('shopping.cart');
      }

      $oldCart = Session::get('cart') ; 
      $cart = new Cart($oldCart); 
      $totalPrice = $cart->totalPrice ;

      return view('shop.checkout',compact('totalPrice')); 
    }

  public function buy(Request $request)
  {
      //validate if there is a cart 
      if(!Session::has('cart'))
        {
          return redirect()->route('shopping.cart');
        }

      $oldCart = Session::get('cart'); 
      $cart = new Cart($oldCart);

          Stripe::setApiKey('sk_test_UAxXO74aC2a5OYWgNgSCqJ8F');
            try{
                 $charge = Charge::create(array(
                      "amount" => $cart->totalPrice * 100 ,
                      "currency" => "usd",
                      "source" => $request->stripeToken, 
                      "description" => "Test Charge for out shopping cart"
                    ));

                 //store the order 
                 $order = new Order ; 

                 $order->cart = serialize($cart); 

                 $order->name  = $request->name ; 

                 $order->address = $request->address ; 

                 $order->user_id = Auth::user()->id ; 

                 $order->payment_id = $charge->id; 

                 Auth::user()->orders()->save($order); 

            }catch(\Exception $e){

                return redirect()->route('checkout')->with('error' , $e->getMessage());
            }
           

            Session::forget('cart');

            return redirect()->route('products.index')->with('success-buy','Successfully Purchased!'); 
  }

}