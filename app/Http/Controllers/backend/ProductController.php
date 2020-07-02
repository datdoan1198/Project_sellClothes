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
use App\User;
use App\Model\ProductImage;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // const NAM::1;
    // const NỮ::0;
    public function index()
    {
        $categories = Category::all();
        $collection = Collection::all();
        $products = Product::orderBy('updated_at','desc')->Paginate(5);
        return view('backend.product.index',[
            'products' => $products,
            'categories' => $categories,
            'collection' => $collection,
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
        return view('backend.product.create',[
            'categories' => $categories,
            'collection' => $collection,
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
        // $validatedDate = $request->validate([
        //         'name' => 'required|min:10|max:225',
        //         'price' => 'required|numeric',
        //         'discount_percent' => 'required|numeric',
        //         'amount' => 'required|numeric',

        // ]);

        // $validatedDate = $request->validate([
        //     'name' => ['required' , 'min:10' , 'max:255'],
        //     'price' => ['required' , 'numeric'],
        //     'discount_percent' => ['required' , 'numeric'],
        //     'amount' => ['required' , 'numeric'],  

        // ]);

        // $validator = Validator::make($request->all(),
        //     [
        //         'name'         => 'required|min:10|max:255',
        //         'price' => 'required|numeric',
        //         'discount_percent'   => 'required|numeric',
        //         'amount'   => 'required|numeric',
        //     ],
        //     [
        //         'required' => ':attribute Không được để trống',
        //         'min' => ':attribute Không được nhỏ hơn :min',
        //         'max' => ':attribute Không được lớn hơn :max'
        //     ],
        //     [
        //         'name' => 'Tên sản phẩm',
        //     ]
        // );
        // if ($validator->errors()){
        //     return back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
       
        $data = $request->all();
        $type_avatar = strstr($data['avatar']->getClientOriginalName(), '.');
        $images = $data['images'];
        $parent_file = $data['name'].'/';
        $information_product = $data['information_product'];
        $user = Auth::user();

        $product = new Product();

        $product->name = $data['name'];     
        $product->category_id = $data['category_id'];
        $product->user_id = $user->id;
        $product->collection_id = $data['collection_id'];
        $product->gender = $data['gender'];
        $product->content = htmlspecialchars($data['content']);
        $product->information_product = json_encode($information_product);
        $product->origin_price = $data['origin_price'];
        $product->sale_price = $data['sale_price'];
        $product->amount = $data['amount'];
        $product->avatar = $parent_file.$data['avatar']->getClientOriginalName();
        Storage::disk('public')->putFileAs($parent_file,$data['avatar'],'avatar'.$type_avatar);

        $product->save();

        $product_id = $product->id;
        if (isset($images)) {
            foreach ($images as $image) {
                $img = new ProductImage();
                $nameFile = $image->getClientOriginalName();             
                $img->name = $data['name'];
                $img->path = $parent_file.$nameFile;
                $img->product_id = $product_id;
                Storage::disk('public')->putFileAs($parent_file,$image,$nameFile);

                $img->save();
            }
        }else {
            echo 'fail';
        }
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
        $product = Product::find($id);
        return view('fondend.detail_product',[
            'product' => $product,

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
       
        $product = Product::find($id);
        $user = Auth::user();

        if ($user->can('update',$product)) {
            $categories = Category::all();
            $collection = Collection::all();
            return view('backend.product.edit',[
                'product' => $product,
                'categories' => $categories,
                'collection' => $collection,
            ]);
        }else {
            echo 'bạn không phải người đăng sản phẩm';
            // return redirect()->route('product.index');
        }

        
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

        
        // $user = $product->user;

        // dd($product);
        // $user = Auth::user();
        // if ($user->can('update',$product)) {
        //     echo 'aaaaa';
        // }else {
        //     echo 'sdsss';
        // }
        // dd();

        // if (Gate::allows('update-product', $product)) {
        //     $product->name = $data['name'];     
        //     $product->category_id = $data['category_id'];
        //     $product->user_id = $data['user_id'];
        //     $product->collection_id = $data['collection_id'];
        //     $product->gender = $data['gender'];
        //     $product->price = $data['price'];
        //     $product->discount_percent = $data['discount_percent'];

        //     $product->save();
        //     return redirect()->route('product.index');
        // }else {
        //     echo 'ko thanh cong';
        // }

        $data = $request->all();
        // $type_avatar = strstr($data['avatar']->getClientOriginalName(), '.');
        // $images = $data['images'];
        $parent_file = $data['name'].'/';
        $information_product = $data['information_product'];
        $user = Auth::user();

        $product = Product::find($id);

        $product->name = $data['name'];     
        $product->category_id = $data['category_id'];
        $product->collection_id = $data['collection_id'];
        $product->gender = $data['gender'];
        // $product->content = htmlspecialchars($data['content']);
        $product->information_product = json_encode($information_product);
        $product->origin_price = $data['origin_price'];
        $product->sale_price = $data['sale_price'];
        $product->amount = $data['amount'];
        // $product->avatar = $parent_file.$data['avatar']->getClientOriginalName();
        // Storage::disk('public')->putFileAs($parent_file,$data['avatar'],'avatar'.$type_avatar);

        $product->save();

        // $product_id = $product->id;
        // if (isset($images)) {
        //     foreach ($images as $image) {
        //         $img = new ProductImage();
        //         $nameFile = $image->getClientOriginalName();             
        //         $img->name = $data['name'];
        //         $img->path = $parent_file.$nameFile;
        //         $img->product_id = $product_id;
        //         Storage::disk('public')->putFileAs($parent_file,$image,$nameFile);

        //         $img->save();
        //     }
        // }else {
        //     echo 'fail';
        // }

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
            Storage::disk('public')->deleteDirectory($name);
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
}
