<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Http\Requests\StoreCategoryRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // if ($user->can('viewAny')) {
             $categories = Category::orderBy('created_at','desc')->get();
        return view('backend.category.list',[
                'categories' => $categories,
            ]);
        // }else {
        //     session()->flash('sucssec','bạn không có quyên truy cập');
        //     return redirect()->route('home');
        // }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        // if ($user->can('create')) {
           $categories = Category::all();
            return view('backend.category.create',[
                'categories' =>$categories,
            ]);     
        // }else {
        //     session()->flash('sucssec','bạn không có quyên truy cập');
        //     return redirect()->route('home');
        // }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $data = $request->all();
        $type_image = strstr($data['avatar']->getClientOriginalName(), '.');

        $category = new Category(); 

        $depth_parent = $category->find($data['parent_id']);
       
        $category->name = $data['name'];
        $category->parent_id = $data['parent_id'];

        if (!$depth_parent == null) {
            $category->depth = $depth_parent['depth'] + 1 ;
        }else {
            $category->depth = 0;
        }
        
        $category->save();

        $parent_file = $category->id . '/';

        Storage::disk('categories')->putFileAs($parent_file,$data['avatar'],'avatar'. $type_image );

        $category->avatar = $parent_file . 'avatar' . $type_image;

        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        
        
        return view('backend.category.detail',[
            'category' => $category,
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
        // if ($user->can('update')) {
            $categories = Category::all();
            $category = Category::find($id);
              return view('backend.category.edit',[
                'categories' => $categories,
                'category' => $category,
                ]); 
        // }else {
        //     session()->flash('sucssec','bạn không có quyên truy cập');
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
        $validator = Validator::make($request->all(),
            [
              'name' => 'required',
              'avatar' => 'image|mimes:jpg,jpeg,png,gif',  
            ], 
            [
               'required' => ':attribute không được để trống', 
               'image' => ':attribute phải đúng định dạng:jpg,png,jpeg, gif'
            ], 
            [
                'name' => 'Tên danh mục',  
                'avatar' => 'Ảnh đại diện', 
            ]

        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $categories = Category::find($data['parent_id']);

        $category = Category::find($id);

        $category->name = $data['name'];
        $category->parent_id = $data['parent_id'];


        if (!$categories == null) {
            $category->depth = $categories['depth'] + 1 ;
        }else {
            $category->depth = 0;
        }
        if ($request->hasFile('avatar')) {
            Storage::disk('categories')->deleteDirectory($id);
            $parent_file = $id . "/";
            $type_image = strstr($data['avatar']->getClientOriginalName(), '.');
            $name_image = 'avatar' . $type_image;
            $category->avatar = $parent_file . $name_image;
            Storage::disk('categories')->putFileAs($parent_file,$data['avatar'],$name_image);

        }
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::find($id);
        Storage::disk('categories')->deleteDirectory($id);
        $category->delete();
        return redirect()->route('category.index');
    }
    public function showProduct($id){       
        $showProducts = Category::find($id)->products;

        return view('backend.category.detailProduct',[
            'showProducts' =>$showProducts,
        ]);
    }
}
