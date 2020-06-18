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
        $products = Product::Paginate(5);

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
        $users = User::all();
        return view('backend.product.create',[
            'categories' => $categories,
            'users' => $users,
            'collection' => $collection,
        ]);
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
         
        
         $product = new Product();

        $product->name = $data['name'];     
        $product->category_id = $data['category_id'];
        $product->user_id = $data['user_id'];
        $product->collection_id = $data['collection_id'];
        $product->gender = $data['gender'];
        $product->price = $data['price'];
        $product->discount_percent = $data['discount_percent'];
        $product->amount = $data['amount'];

        $product->save();
        $product_id = $product->id;

        if (isset($data['productImage'])) {
            foreach ($data['productImage'] as $file) {
                $image = new ProductImage();
                if ($request->hasFile('productImage')) {
                   $image->name = $data['name'];
                   $image->path = $file->getClientOriginalName();
                   $file->move('image',$file->getClientOriginalName());
                   $image->product_id = $product_id;

                   $image->save();
                }else {
                    echo 'fail';
                }
            }
        }else {
            
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

        return view('backend.product.detail',[
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
        $categories = Category::all();
        $collection = Collection::all();
        $users = User::all();
        $product = Product::find($id);
        return view('backend.product.edit',[
            'product' => $product,
            'categories' => $categories,
            'users' => $users,
            'collection' => $collection,
        ]);
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

        $product = Product::find($id);
        $product->name = $data['name'];     
        $product->category_id = $data['category_id'];
        $product->user_id = $data['user_id'];
        $product->collection_id = $data['collection_id'];
        $product->gender = $data['gender'];
        $product->price = $data['price'];
        $product->discount_percent = $data['discount_percent'];

        $product->save();
        $product_id = $product->id;
        if (isset($data['productImage'])) {
            foreach ($data['productImage'] as $file) {
                $image = new ProductImage();
                if ($request->hasFile('productImage')) {
                   $image->name = $data['name'];
                   $image->path = $file->getClientOriginalName();
                   $file->move('image',$file->getClientOriginalName());
                   $image->product_id = $product_id;

                   $image->save();
                }else {
                    echo 'fail';
                }
            }
        }else {
            
        }

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

        $product->delete();

        return redirect()->route('product.index');
    }
    public function showImages($id){
            $showImages = Product::find($id)->images;
            return view('backend.product.detailImage',[
                'showImages' => $showImages 
            ]);
    }
}
