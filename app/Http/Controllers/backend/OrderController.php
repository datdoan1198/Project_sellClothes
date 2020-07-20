<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\Product;
use App\Model\Order_Product;
use App\Model\Size;
use Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
	public function index(){
		$orders = Order::all();

		return view('backend.order.list',[
			'orders' => $orders,
		]);

	}
	public function store(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($request->all(),
			[
				'name' => 'required',
				'email' => 'required|email',
				'address' => 'required',
				'phone' => 'required|min:10|max:13',	
			],

			[
				'required' => ':attribute không được để trống',
				'email' => ':attribute phải đúng định dạng',
				'min' => ':attribute phải có ít nhất 10 số',
				'max' => ':attribute không được vượt quá 13 số',
 			],

 			[
 				'name' => 'Họ và Tên',
 				'email' => 'Email',
 				'address' => 'Địa chỉ',
 				'phone' => 'Số điện thoại',
 			],
		);

		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}
		
		$user = Auth::user();
		$items = Cart::content();
		$sizes = Size::all();
		$order = new Order();

		$order->name = $data['name'];

		if (Auth::user() != null) {
			$order->user_id = $user->id;
		}
		$order->email = $data['email'];
		$order->address = $data['address'];
		$order->phone = $data['phone'];
		$order->save();
		$order_id = $order->id;

		
		foreach ($items as $item) {
			$order_product = new Order_Product();
			$order_product->order_id = $order_id;
			$order_product->product_id = $item->id;
			$order_product->name_product = $item->name;
			$order_product->price = $item->price;
			$order_product->qty = $item->qty;

			$sizes = Product::find($item->id)->size;
			foreach ($sizes as $size) {
				if ($size->id == $item->options['size']) {
					$order_product->Size = $size->size;	
				}	
			}


			$order_product->save();

			$product = Product::find($item->id);

			$product->amount = $product->amount - $item->qty;
			$product->view_sell = $product->view_sell + 1 ; 
			if ($product->amount == 0) {
				$product->status = 0;
			}
			$product->save();
		}
		return redirect()->route('home');
	}
	public function destroy($id)
	{
		$order = Order::find($id);
		$order->delete();
		$datas = Order_Product::where('order_id',$id)->get();
		foreach ($datas as $data) {
			$id_product = $data->id;
			$order_product = Order_Product::find($id_product);	
			$order_product->delete();
		}	
		return redirect()->route('order.index');
	}
	public function complete($id)
	{
		$complete = Order::find($id);

		if ($complete->status == 0) {
			$complete->status = 1;
			$complete->save();
		}elseif ($complete->status == 1) {
			$complete->status = 2;
			$complete->save();
		}else{
			$complete->status = 0;
			$complete->save();
		}

		return redirect()->route('order.index');
	} 
    public function showProduct($id){
    	// $showProducts =  Order::find($id)->products;
    	$order_products =  Order::find($id)->order_products;
    	// dd($order_products);
    	return view('backend.order.detailProduct',[
    		// 'showProducts' => $showProducts,
    		'order_products' => $order_products,
    	]);
    }
}
