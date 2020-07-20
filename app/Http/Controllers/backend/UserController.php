<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserRequest; 
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_auth = Auth::user();
        $users =  User::all();
        // if ($user_auth->can('viewAny')) {
            return view('backend.user.list',[
            'users'=>$users,
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
            return view('backend.user.create');
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
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $type_image = strstr($data['image']->getClientOriginalName(), '.');
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->password = bcrypt($data['password']);

        $user->save();

        $parent_file =$user->id . '/';
        Storage::disk('users')->putFileAs($parent_file,$data['image'],'avatar'. $type_image );
        $user->image = $parent_file . 'avatar' . $type_image;
        $user->save();


        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.detail',[
            'user'=>$user,
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
        $user_auth = Auth::user();
        $user = User::find($id);
        // if ($user_auth->can('update')) {
            return view('backend.user.edit',[
            'user'=>$user,
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
                'email' => 'required|email',
                'phone' => 'required|min:10|max:13',
                'address' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,gif|max:2048',

            ],
            [
                'required' => ':attribute không được để trống',
                'email' => ':attribute phải đúng định dạng',
                'min' => ':attribute nhỏ quá',
                'max' => ':attribute không được lớn hơn 13 số',
                'image'  => ':attribute phải có kiểu :jpg, png, jpeg, gif',
            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'address' => 'Địa chỉ',
                'image' => 'Ảnh địa diện',
            ]
        );
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = $request->all();

        $user = User::find($id);

        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        if ($request->hasFile('image')) {
            Storage::disk('users')->deleteDirectory($id);
            $parent_file = $id . "/";
            $type_image = strstr($data['image']->getClientOriginalName(), '.');
            $name_image = 'avatar' . $type_image;
            $user->image = $parent_file . 'avatar' . $type_image;
            Storage::disk('users')->putFileAs($parent_file,$data['image'],$name_image);

       }
       $user->save();

       return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user_auth = Auth::user();
        // if ($user_auth->can('delete')) {
        Storage::disk('users')->deleteDirectory($id);
        $user->delete();
            return redirect()->route('user.index');
       // }else {
       //      session()->flash('sucssec','bạn không có quyên truy cập');
       //      return redirect()->route('home');
       // }
    }
    public function showProduct($id){

        $showProducts = User::find($id)->products;
        return view('backend.user.detailProduct',[
            'showProducts' => $showProducts,
        ]);

        

    }
}
