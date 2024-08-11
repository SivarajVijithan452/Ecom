<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function index (){
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $deliverd = Order::where('status','Delivered')->get()->count();
        return view('admin.index',compact('user','product','order','deliverd'));
    }

    public function home(){
        $product = Product::all();
        if(Auth::id()){
        $user = Auth::user();
        $user_id = $user->id;
        $count = Cart::where('user_id',$user_id)->count();
        }else{
            $count = '';
        }
        
        return view('home.index',compact('product','count'));
    }

    public function login_home(){
        $product = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id',$user_id)->count();
            }else{
                $count = '';
            }
        return view('home.index',compact('product','count'));
    }

    public function product_details($id){

        $data = Product::find($id);

        if(Auth::id()){
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id',$user_id)->count();
            }else{
                $count = '';
            }

        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id){

        
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        flash()->success('Your Product has been added to cart successfully!.');
        return redirect()->back();

    }

    public function mycart(){
        if(Auth::id()){
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id',$user_id)->count();
            $cart = Cart::where('user_id',$user_id)->get();
            }else{
                $count = '';
            }
        

        return view('home.mycart',compact('count','cart'));
    }

    public function deleteCart($id)
    {
        // Find the cart item by ID
        $cartItem = Cart::findOrFail($id);

        // Check if the cart item belongs to the authenticated user
        if ($cartItem->user_id == Auth::id()) {
            // Delete the cart item
            $cartItem->delete();
            flash()->success('Your Product has been Removed the cart successfully!.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id',$user_id)->get();
        foreach($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->save();
        }
        $cart_remove = Cart::where('user_id',$user_id)->get();
        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
           
        }

        flash()->success('Your Order placed successfully!.');

        return redirect()->back();

        
    }

    public function myorders(){

        if(Auth::id()){
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id',$user_id)->count();
            $cart = Cart::where('user_id',$user_id)->get();
            $orders = Order::where('user_id', Auth::id())->with('product')->get();
            }else{
                $count = '';
            }
        return view('home.order',compact('count','cart','orders'));
    }
}
