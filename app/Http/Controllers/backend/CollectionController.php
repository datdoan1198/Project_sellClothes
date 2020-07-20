<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Collection;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CollectionController extends Controller
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
            $collections = Collection::all();
        
            return view('backend.collection.list',[
                'collections' => $collections,
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

        return view('backend.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'avatar' => 'required|image|mimes:jpg,png,gif,jpeg',
            ],
            [
                'required' => ':attribute không được để trống',
                'image' => ':attribute phải đúng định dạng : jpg ,png ,gif ,jpeg ',
            ],
            [
                'name' => 'Tên bộ sưu tập',
                'avatar' => 'Ảnh bộ sưu tập',
            ]

        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $type = strstr($data['avatar']->getClientOriginalName(), '.');

        $collection = new Collection();

        $collection->name = $data['name'];

        $collection->save();

        $file = $collection->id . '/';
        Storage::disk('collections')->putFileAs($file,$data['avatar'],'avatar'.$type);
        $collection->avatar = $file . 'avatar' . $type;
        $collection->save();

        return redirect()->route('collection.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(1);  
        $data = Collection::find($id)->products;
        dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Collection::find($id);
        return view('backend.collection.edit',[
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
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'avatar' => 'image|mimes:jpg,png,gif,jpeg',
            ],
            [
                'required' => ':attribute không được để trống',
                'image' => ':attribute phải đúng định dạng : jpg ,png ,gif ,jpeg ',
            ],
            [
                'name' => 'Tên bộ sưu tập',
                'avatar' => 'Ảnh bộ sưu tập',
            ]


        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        $collection = Collection::find($id);

        $collection->name = $data['name'];
        if ($request->hasFile('avatar')) {
            Storage::disk('collections')->deleteDirectory($id);
            $file = $id . '/';
            $type = strstr($data['avatar']->getClientOriginalName(),'.');
            $collection->avatar = $file . 'avatar' . $type;
            Storage::disk('collections')->putFileAs($file,$data['avatar'],'avatar' . $type);
        }
        $collection->save();
        return redirect()->route('collection.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $collection = Collection::find($id);

        Storage::disk('collections')->deleteDirectory($id);

        $collection->delete();

        return redirect()->route('collection.index');
    }
}
