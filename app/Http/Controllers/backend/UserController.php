<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::all();

        return view('backend.user.list',[
            'users'=>$users,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->can('create')) {
            return view('backend.user.create');
        }else {
            echo 'Bạn không có quyền thêm mối user';
        }
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
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->password = bcrypt($data['password']);
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
        if ($user_auth->can('update')) {
            return view('backend.user.edit',[
            'user'=>$user,
            ]);
        }else {
            echo 'bạn không có quyền sửa user';
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

       $user = User::find($id);
       $user->name = $data['name'];
       $user->phone = $data['phone'];
       $user->address = $data['address'];
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
       if ($user_auth->can('delete')) {
            $user->delete();
            return redirect()->route('user.index');
       }else {
           echo 'Bạn không có quyền xóa user';
       }
    }
    public function showProduct($id){

        $showProducts = User::find($id)->products;
        return view('backend.user.detailProduct',[
            'showProducts' => $showProducts,
        ]);

        

    }
}
