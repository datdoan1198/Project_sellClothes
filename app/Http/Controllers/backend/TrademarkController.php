<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Trademark;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trademarks = Trademark::all();
        return view('backend.trademark.list',[
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
        return view('backend.trademark.create');
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
                'avatar'  => 'required',
            ],

            [
                'required'=>':attribute khong duoc de trong',

            ],

            [
                'name' => 'ten thuong hieu',
                'avatar' => 'anh',
            ]

        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        $type = strstr($data['avatar']->getClientOriginalName(), '.');

        $trademark = new Trademark();

        $trademark->name = $data['name'];

        $trademark->save();

        $file = $trademark->id . '/';

        Storage::disk('trademarks')->putFileAs($file,$data['avatar'],'avatar'. $type);
        $trademark->avatar = $file . 'avatar' . $type;

        $trademark->save();

        return redirect()->route('trademark.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trademark = Trademark::find($id);
        return view('backend.trademark.edit',[
            'trademark' => $trademark,
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

        $trademark = Trademark::find($id);

        $trademark->name = $data['name'];

        if ($request->hasFile('avatar')) {
            Storage::disk('trademarks')->deleteDirectory($id);
            $file = $id . "/";
            $type = strstr($data['avatar']->getClientOriginalName(), '.');
            $trademark->avatar = $file . 'avatar' . $type;
            Storage::disk('trademarks')->putFileAs($file,$data['avatar'],'avatar'.$type);

        }

        $trademark->save();

        return redirect()->route('trademark.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trademark = Trademark::find($id);

        Storage::disk('trademarks')->deleteDirectory($id);

        $trademark->delete();

        return redirect()->route('trademark.index');
    }
}
