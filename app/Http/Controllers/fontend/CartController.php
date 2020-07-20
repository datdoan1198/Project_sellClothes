<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\Size;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $item = Cart::content();
    // dd($item);
       $data = Product::all();

       $sizes = Size::all();


       // $tong = Cart::total();
       // dd($tong);
       return view('fondend.checkout',[
       		'item' =>$item,
            'data' => $data,
            'sizes' => $sizes,
       ]);
    }
    public function add(Request $request ,$id)
    {
        
       
            $data = $request->all();
            $product = Product::find($id);
            $size = $data['size'];
            if ($product->amount <= $data['qty'] ) {
                $qty = $product->amount;
                $request->session()->flash('message','số lượng sản phâm ' . $product->name . ' chỉ còn ' . $product->amount . ' sản phẩm' );
            }else {
                $qty = $data['qty'];
            }

    	Cart::add($product->id,$product->name,$qty,$product->sale_price,0,['size'=> $size]);
        
 
    	return redirect()->route('cart.index'); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(1);    
    }

    public function plus_qty($id)
    {
        $product = Cart::get($id);
       
        $amount_product = Product::find($product->id);
        if ($amount_product->amount <= $product->qty ) {
            session()->flash('message','số lượng sản phẩm ' . $product->name . ' chỉ còn ' . $amount_product->amount . ' sản phẩm không thể thêm' );
            $qty = $amount_product->amount;
        }else {
            $qty = $product->qty + 1;
        }
        
        Cart::update($id,$qty);

        return redirect()->route('cart.index');
    }
    public function minus_qty($id)
    {
        $product = Cart::get($id);

        if ($product->qty == 0) {
            Cart::remove($id);
        }
        $qty = $product->qty - 1;
        Cart::update($id,$qty);

        return redirect()->route('cart.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $cart = Cart::content();

        dd($cart);
        echo 'sssss';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	Cart::remove($id);
       	return redirect()->route('cart.index');
    }
}
