<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Model\Category;
use App\Model\Product;
use App\Model\Collection;
use App\Model\Trademark;
use App\Model\Review;
use App\User;
use App\Model\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // protected const ADMIN = 1;
    // protected const USER = 0;
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if (isset($user)) {
            if ($user->role == 1 || $user->role == 2 ) {     
                $all_products = Product::all()->count();
                $all_users = User::where('role' ,'0')->count();
                $all_order = Order::where('status' ,'2')->count();
                $sum = Order::where('status' ,'2')->get();
     
                return view('backend.index',[
                    'all_products' => $all_products,
                    'all_users' => $all_users,
                    'all_order' => $all_order,
                    'sum' => $sum,

                ]);
            }else {

                $collections = Collection::all();
                $trademarks = Trademark::orderBy('created_at','desc')->limit(4)->get();
                $new_products = Product::where('status',1)->orderBy('created_at','desc')->take(6)->get();
                $sell_products = Product::where('status',1)->orderBy('view_sell','desc')->take(6)->get();
                return view('fondend.home',[
                    'collections' => $collections,
                    'new_products' => $new_products,
                    'sell_products' =>$sell_products,
                    'trademarks' => $trademarks,

                ]);
            }
        }else {
            $collections = Collection::all();
            $trademarks = Trademark::orderBy('created_at','desc')->limit(4)->get();
            $new_products = Product::where('status',1)->orderBy('created_at','desc')->take(6)->get();
            $sell_products = Product::where('status',1)->orderBy('view_sell','desc')->take(6)->get();

            return view('fondend.home',[
                'collections' => $collections,
                'new_products' => $new_products,
                'sell_products' =>$sell_products,
                'trademarks' => $trademarks,

            ]);
        }
        
    }


    public function category ($id)
    {

        $products = Product::where('category_id',$id)->where('status',1)->orderBy('created_at','desc')->paginate(3);
        $id = $id;
        return view('fondend.category',[
            'products' => $products,
            'id' => $id,
        ]);

    }
    public function price_product_category ($id)
    {

        $products = Product::where('category_id',$id)->where('status',1)->orderBy('sale_price','desc')->get();
        $id = $id;
        return view('fondend.category',[
            'products' => $products,
            'id' => $id,
        ]);

    }
    public function viewsell_product_category ($id)
    {

        $products = Product::where('category_id',$id)->where('status',1)->orderBy('view_sell','desc')->get();
        $id = $id;
        return view('fondend.category',[
            'products' => $products,
            'id' => $id,
        ]);

    }

     public function all_collection ()
    {
        $collections = Collection::orderBy('updated_at','desc')->get();
        return view('fondend.all_collection',[
            'collections' => $collections,
            
        ]);
    }



    public function collection ($id)
    {
        $product_collections = Product::where('status',1)->where('collection_id',$id)->orderBy('created_at','desc')->paginate(3);
        $id = $id;
        return view('fondend.collection',[
            'product_collections' => $product_collections,
            'id' => $id,
        ]);
    }

     public function price_collection ($id)
    {
        $id = $id;
        $product_collections = Product::where('collection_id',$id)->where('status',1)->orderBy('sale_price','asc')->paginate(3);
        return view('fondend.collection',[
            'product_collections' => $product_collections,
            'id' => $id,
        ]);
    }
    public function view_sell_collection ($id)
    {
        $id = $id;
        $product_collections = Product::where('collection_id',$id)->where('status',1)->orderBy('view_sell','desc')->paginate(3);
        return view('fondend.collection',[
            'product_collections' => $product_collections,
            'id' => $id,
        ]);
    }



    public function all_trademark()
    {
        $trademarks = Trademark::orderBy('updated_at','desc')->get();
        return view('fondend.all_trademark',[
            'trademarks' => $trademarks,
            
        ]);
    }
     public function product_trademark ($id)
    {

        $product_trademakes = Product::where('status',1)->where('trademark_id',$id)->orderBy('created_at','desc')->paginate(3);
        $id = $id;
        return view('fondend.product_trademark',[
            'product_trademakes' => $product_trademakes,
            'id' => $id,
        ]);
    }
     public function price_trademark ($id)
    {

        $id = $id;
        $product_trademakes = Product::where('trademark_id',$id)->where('status',1)->orderBy('sale_price','asc')->paginate(3);
        return view('fondend.product_trademark',[
            'product_trademakes' => $product_trademakes,
            'id' => $id,
        ]);
    }
    public function view_sell_trademark ($id)
    {
        $id = $id;
        $product_trademakes = Product::where('trademark_id',$id)->where('status',1)->orderBy('view_sell','desc')->paginate(3);
        return view('fondend.product_trademark',[
            'product_trademakes' => $product_trademakes,
            'id' => $id,
        ]);
    }



    public function detail_product($id)
    {

        $user = Auth::user();
        
        if (isset($user)) {
            $check = 1;

        }else {
            $check = 0;
        }
        $product = Product::find($id);
        $product_categories = Product::where('category_id', $product->category_id)->orderBy('created_at','desc')->limit(3)->get();
        $information_product = [];
        foreach (json_decode($product['information_product']) as $key => $value) {
            $information_product[] = $value;
        }
        $review_products = Review::where('product_id', $id)->orderBy('created_at','desc')->get();

        return view('fondend.detail_product',[
            'product' => $product,
            'information_product' => $information_product,
            'check' => $check,
            'product_categories' => $product_categories,
            'review_products' => $review_products,
        ]);
    }
}
