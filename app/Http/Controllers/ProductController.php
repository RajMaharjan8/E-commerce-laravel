<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index(){
        $data = Product::all();
        //sending data to product webpage


        //in this 'product' is the name of the web file
        //and 'products' is a variable name
        return view('product',['products'=>$data]);
    }
    
//     function detail($id){
//          $data = Product::find($id);

// // extra
//         $user = Session::get('user')['id'];
    
//         $comments = DB::table('comments')
//             ->join('products', 'comments.product_id', '=', 'products.id')
//             ->join('users', 'comments.user_id', '=', 'users.id')
//             ->where('comments.user_id', $user)
//             ->select('users.name as user_name', 'products.*', 'comments.comment')
//             ->get();

        
//             if ($user) {
                
//                 return view('detail',[
//                     'details'=>$data,
//                     'comments'=>$comments,
//                     'message'=> "Happy New Year",
//             ]);
//             } else {
//                 return 'User not authenticated';
//             }

// //

//     //     return view('detail',[
//     //         'details'=>$data,
//     //         'message'=> "Happy New Year",
//     // ]);
//     }

public function detail($id) {
    $data = Product::find($id);

    // Retrieve comments from all users for the specific product
    $comments = DB::table('comments')
        ->join('products', 'comments.product_id', '=', 'products.id')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->where('comments.product_id', $id)  // Filter by product_id
        ->select('users.name as user_name', 'products.*', 'comments.comment')
        ->get();

    // Check if a user is logged in
    $user = Session::get('user');

    if ($user) {
        return view('detail', [
            'details' => $data,
            'comments' => $comments,
            'message' => "Happy New Year",
        ]);
    } else {
        return 'User not authenticated';
    }
}


    public function search(Request $req){
        // 'like', '%' is used for matching the input query. even if the user fails to enter the whole item name correctly
        $data = Product::where('name','like','%'. $req->input('query').'%')->get();
        // $search = $req->input();
        return view('search',[
            'products'=>$data,
        ]);
    }

    public function add_to_cart(Request $req){
        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            //$req->product_id is the name of the input field we defined
            $cart->save();
            return redirect('/');
        } else{
            return redirect("/login");
        }
    }

    public static function cartItem(){
    $userId = Session::get('user')['id'];
    return Cart::where('user_id',$userId)->count();
    }

    public static function cartdetail()
    {
        $user = Session::get('user')['id'];

        //joining cart table and products table to fetch the data
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$user)
        ->select('products.*','cart.id as cart_id')
        ->get()
        ;

        if ($user) {
            // Assuming there's a 'user_id' column in your Cart table
            return view('cartdetail',['products'=>$products]);
        } else {
            return 'User not authenticated';
        }
    }

    public function removeCart($id){
        Cart::destroy($id);
        return redirect('cartdetail');
    }

    public function addComment(Request $req){
        $user_id = $req->session()->get('user')['id'];
        $product_id = $req->product_id;
        $comment = $req->comment_data;

        if($user_id){
            Comment::create([
                'user_id'=>$user_id,
                'product_id'=>$product_id,
                'comment'=> $comment
            ]);
            
            return redirect("/detail/$product_id");

        }else{
            return response()->json([
                'message'=>'fail to add comment to the database',
            ]);
        }
        
        // Debugging: Check if data is received
        // dd($product_id);
        // return $req->all();
    }

    public function getComment() {
        $user = Session::get('user')['id'];
    
        $comments = DB::table('comments')
            ->join('products', 'comments.product_id', '=', 'products.id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.user_id', $user)
            ->select('users.name as user_name', 'products.*', 'comments.comment')
            ->get();

        
            if ($user) {
                // Assuming there's a 'user_id' column in your Cart table
                return view("detail/",['products'=>$products]);
            } else {
                return 'User not authenticated';
            }
    
        return $comments;
    }
    
     
}
