<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;

class WarehouseController extends Controller
{
   	public function index()
   	{
   		$products = Product::where('status',0)->get();
   		return view('backend.warehouse.list',[
   			'products' => $products,
   		]);
   	}
   	public function edit($id)
   	{
   		$product = Product::find($id);
   		return view('backend.warehouse.edit',[
   			'product' => $product,
   		]);

   	}
   	public function update(Request $request , $id)
   	{
   		$data = $request->all();

   		$product = Product::find($id);

   		$product->amount = $data['amount'];
   		$product->status = $data['status'];

   		$product->save();

   		return redirect()->route('warehouse.index');
   	}
}
