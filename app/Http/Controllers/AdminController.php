<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view("admin.category",compact("data"));
    }

    public function add_category(Request $request){

        // Validate the request
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        flash()->success('Your Category has been Saved.');
        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        flash()->success('Your Category has been Deleted Successfully.');
        return redirect()->back();
    }

    public function edit_category($id){

        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        flash()->success('Your Category has been Updated Successfully.');
        return redirect('/view_category');
    }

    public function add_product(){

        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request){

        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$image_name);
            $data->image = $image_name;
        }
        $data->save();
        flash()->success('Your Product has been Saved.');
        return redirect()->back();

   }

   public function view_product(){

    $product = Product::paginate(3);
    return view('admin.view_product',compact('product'));
   }

   public function delete_product($id){

    $data = Product::find($id);
    $image_path = public_path('products/'.$data->image);
    if(file_exists($image_path)){
        unlink($image_path);
    }
    $data->delete();
    flash()->success('Your Product has been Deleted.');
    return redirect()->back();

   }

   public function update_product($id){

    $data = Product::find($id);
    $category = Category::all();
    return view('admin.update_page',compact('data','category'));

   }

   public function edit_product(Request $request, $id){

    $data = Product::find($id);
    $data->title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->quantity = $request->quantity;
    $data->category = $request->category;
    $image = $request->image;
    if($image){
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$image_name);
        $data->image = $image_name;

   }
   $data->save();
   flash()->success('Your Product has been Updated.');
   return redirect('/view_product');


}
    public function product_search(Request $request){
        $search = $request->search;
        $product = Product::where('Title','LIKE','%'.$search.'%')->
        orWhere('category','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.view_product',compact('product'));
    }

    public function view_orders(){
        $data = Order::all();
        return view('admin.order',compact('data'));
    }

    public function on_the_way($id){
        $data = Order::find($id);
        $data->status = 'On the Way';
        $data->save();
        flash()->success('Your Order has been Updated.');
        return redirect('/view_orders');
    }


    public function deliverd($id){
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        flash()->success('Your Order has been Updated.');
        return redirect('/view_orders');
    }

    public function print($id) {
        // Fetch the order details
        $order = Order::find($id);
    
        // Check if the order exists
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
    
        // Fetch the user associated with the order
        $user = $order->user;
    
        // Fetch all orders for the given user ID
        $orders = Order::where('user_id', $user->id)->get();
    
        // Calculate the total price of all products in the orders
        $totalPrice = $orders->sum(function ($order) {
            return $order->product->price;
        });
    
        // Prepare data for the view
        $data = [
            'user' => $user,
            'orders' => $orders,
            'totalPrice' => $totalPrice
        ];
    
        // Generate PDF from the view
        $pdf = Pdf::loadView('admin.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
    
}
