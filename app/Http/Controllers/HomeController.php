<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Model\Category;
use App\Model\Product;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user->role);
        if ($user->role == 1 || $user->role == 2 ) {
            return view('backend.index');
        }else {
            return view('fondend.home');
        }
        // return view('home');
    }
    public function category()
    {
        return view('fondend.category');
    }
    public function detail_product($id)
    {
        $product = Product::find($id);
        return view('fondend.detail_product',[
            'product' => $product,
        ]);
    }
    public function dress ()
    {
        // dd('ádasdasd');
        $categories = Category::all()->where('name','Đầm');
        foreach ($categories as $category) {
            $id = $category->id;

        }
        $products = Category::find($id)->products;    
        return view('fondend.category',[
            'products' => $products,
        ]);

    }
    public function t_shỉrt()
    {
       $categories = Category::all()->where('name','Áo Thun Nam');
        foreach ($categories as $category) {
            $id = $category->id;

        }
        $products = Category::find($id)->products;

        return view('fondend.category',[
            'products' => $products,
        ]); 
    }
}
