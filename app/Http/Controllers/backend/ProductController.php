<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Model\Product;
use App\Model\Category;
use App\Model\Collection;
use App\Model\Trademark;
use App\User;
use App\Model\ProductImage;
use App\Model\Size;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Auth;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\Cache;
use App\Model\Review;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // const NAM::1;
    // const NỮ::0;
    public function index(Request $request)
    {

        $categories = Category::all();
        $collection = Collection::all();
        $trademarks = Trademark::all();
        $products = Product::orderBy('updated_at','desc')->get();
        return view('backend.product.index',[
            'products' => $products,
            'categories' => $categories,
            'collection' => $collection,
            'trademarks' => $trademarks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
        $collection = Collection::all();
        $trademarks = Trademark::all();
        return view('backend.product.create',[
            'categories' => $categories,
            'collection' => $collection,
            'trademarks' => $trademarks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $data = $request->all();
        $information_product = $data['information_product'];
        $product = new Product();
        $user = Auth::user();
        $product->name = $data['name'];     
        $product->category_id = $data['category_id'];
        $product->user_id = $user->id;
        $product->collection_id = $data['collection_id'];
        $product->trademark_id = $data['trademark_id'];
        $product->gender = $data['gender'];
        $product->content = htmlspecialchars($data['content']);
        $product->information_product = json_encode($information_product);
        $product->origin_price = $data['origin_price'];
        $product->sale_price = $data['sale_price'];
        $product->status = 2;
        $product->amount = $data['amount'];
        
        $product->save();

        $images = $data['images'];
        $product_id = $product->id;
        $parent_file = $product_id  .'/';
        $type_avatar = strstr($data['avatar']->getClientOriginalName(), '.');

        $product->avatar = $parent_file . 'avatar' . $type_avatar;

        Storage::disk('products')->putFileAs($parent_file,$data['avatar'],'avatar'.$type_avatar);

        $product->save();

            foreach ($images as $image) {
                $img = new ProductImage();
                $nameFile = $image->getClientOriginalName();             
                $img->name = $data['name'];
                $img->path = $parent_file.$nameFile;
                $img->product_id = $product_id;
                Storage::disk('products')->putFileAs($parent_file,$image,$nameFile);

                $img->save();
            }

            foreach ($data['size'] as $size) {
                $size_product =  new Size();

                $size_product->name = $data['name'];
                $size_product->size = $size;
                $size_product->product_id = $product_id;

                $size_product->save();

            }
        $request->session()->flash('sucssec','Tạo Mới Sản Phẩm Thành Công');
    
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if (isset($user)) {
            $check = 1;
        }else {
            $check = 0;
        }
        $product = Product::find($id);
        $information_product = [];
        foreach (json_decode($product['information_product']) as $key => $value) {
            $information_product[] = $value;

        }
        $product_categories = Product::where('category_id', $product->category_id)->orderBy('created_at','desc')->limit(3)->get();
        $review_products = Review::where('product_id', $id)->orderBy('created_at','desc')->get();

        return view('fondend.detail_product',[
            'product' => $product,
            'information_product'=>$information_product,
            'check' => $check,
            'product_categories' => $product_categories,
            'review_products' => $review_products,


        ]);     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $user = Auth::user();
        $product = Product::find($id);
        // if ($user->can('update',$product)) {
           
            $information_product = [];
            foreach (json_decode($product['information_product']) as $key => $value) {
                $information_product[] = $value;
            }
            $categories = Category::all();
            $collection = Collection::all();
            $trademarks = Trademark::all();
            return view('backend.product.edit',[
                'product' => $product,
                'categories' => $categories,
                'collection' => $collection,
                'information_product' => $information_product,
                'trademarks' => $trademarks,
            ]);
        // }else {
        //     session()->flash('sucssec','Bạn không có quyền truy cập');
        //     return redirect()->route('home');
        // }
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

        $data = $request->all();
        $validator = validator::make($request->all(),
            [
                'name' => 'required',
                'origin_price' => 'required|numeric',
                'sale_price' => 'required|numeric', 
                'avatar' =>'image|mimes:jpg,png,jpeg,gif|max:2048',
                'images.*' =>'image|mimes:jpeg,jpg,png,gif|max:2048',    
            ],
            [
                'required' => ':attribute Không được để trống',
                'min' => ':attribute không ngăn hơn 5 kí tự',
                'numeric' => ':attribute phải là số',
                'image' => ':attribute phải có kiểu :jpg, png, jpeg, gif',
                'max' => 'dung lượng của :attribute quá  lớn'
            ],
            [
                'name' => 'Tên sản phẩm',
                'origin_price' => 'Giá bán gốc',
                'sale_price' => 'giá bán',
                'images' => 'ảnh',
                'avatar' => 'ảnh đại diện',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        

        $product = Product::find($id);

        $product->name = $data['name'];     
        $product->category_id = $data['category_id'];
        $product->collection_id = $data['collection_id'];
        $product->trademark_id = $data['trademark_id'];
        $product->gender = $data['gender'];
        $product->content = htmlspecialchars($data['content']);
        if ($data['information_product'] != null) {
            $information_product = $data['information_product'];
            $product->information_product = json_encode($information_product);
        }      
        $product->origin_price = $data['origin_price'];
        $product->sale_price = $data['sale_price'];

        $product->save();
        $parent_file = $id .'/';
        if ($request->hasFile('avatar')) {
            Storage::disk('products')->deleteDirectory($id);
            $type_avatar = strstr($data['avatar']->getClientOriginalName(), '.');
            $product->avatar = $parent_file . 'avatar' . $type_avatar;
            Storage::disk('products')->putFileAs($parent_file,$data['avatar'], 'avatar' . $type_avatar);
            $product->save();

        }
        
        if ($request->hasFile('images')) {
            $images = $data['images'];
            foreach ($images as $image) {
                $img = new ProductImage();
                $nameFile = $image->getClientOriginalName();             
                $img->name = $data['name'];
                $img->path = $parent_file.$nameFile;
                $img->product_id = $id;
                Storage::disk('products')->putFileAs($parent_file,$image,$nameFile);

                $img->save();
            }
        }
        if (isset($data['size'])) {
            foreach ($data['size'] as $size) {
                $size_product =  new Size();

                $size_product->name = $data['name'];
                $size_product->size = $size;
                $size_product->product_id = $id;

                $size_product->save();

            }
        }
        
        $request->session()->flash('sucssec','Chỉnh Sửa Sản Phẩm Thành Công');
        return redirect()->route('product.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $user = Auth::user();
        
        if ($user->can('delete',$product)) {
            $name = $product->name;
            Storage::disk('products')->deleteDirectory($id);
            $images = ProductImage::all()->where('product_id',$id); 
            foreach ($images as $image) {
                $image->delete();
            }
            $product->delete();
            return redirect()->route('product.index');
        }else {
            echo 'bạn không phải người đăng sản phẩm '.'<br>';
            echo 'không được xóa';
        }
    }
    public function showImages($id){
            $showImages = Product::find($id)->images;

            return view('backend.product.detailImage',[
                'showImages' => $showImages 
            ]);
    }
    public function check($id)
    {
        $product = Product::find($id);

        $product->status = 1;
        $product->save();

        return redirect()->route('product.index');
    }
}
