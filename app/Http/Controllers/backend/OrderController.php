<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;

class OrderController extends Controller
{
	public function index(){
		$orders = Order::all();

		return view('backend.order.list',[
			'orders' => $orders,
		]);

	}
    public function showProduct($id){
    	$showProducts =  Order::find($id)->products;
    	// dd($showProducts);
    	return view('backend.order.detailProduct',[
    		'showProducts' => $showProducts,
    	]);
    }
}
