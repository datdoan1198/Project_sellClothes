<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Review;
use App\User;
use Validator;
class ReviewController extends Controller
{
    public function index()
    {
    	$reviews = Review::all();

    	return view('backend.review.list',[
    		'reviews' => $reviews,

    	]);

    }
    public function store(Request $request)
    {

    	$validator = Validator::make($request->all(),
    		[
    			'name' => 'required',
    			'content' => 'required',
    			'rating' => 'required',
    		],

    		[
    			'required' => ':attribute không được để trống',
    		],

    		[
    			'name' => 'Tên người bình luận',
    			'content' => 'nội dung',
    			'rating' =>'đánh giá',
    		]


    	);

    	if ($validator->fails()) {
    		return back()->withErrors($validator)->withInput();
    	}
        $all = Review::all();

        $data = $request->all();
        // dd($data);
        foreach ($all as $review) {
            if ($review->user_id == $data['user_id'] && $review->product_id == $data['product_id']) {
            $id =$review->id;
            $review = Review::find($id);

            $review->content = $data['content'];
            $review->star = $data['rating'];

            $review->save();
            return redirect()->route('detail_product',['id' => $data['product_id'] ]);
                }
        }
    	$review = New Review();
    	$review->name = $data['name'];
    	$review->product_id = $data['product_id'];
    	$review->user_id = $data['user_id'];
    	$review->content = $data['content'];
    	$review->star = $data['rating'];

    	$review->save();

    	return redirect()->route('detail_product',['id' => $data['product_id'] ]);
    }


    public function update(Request $request , $id)
    {
        $data = $request->all();
        dd($data);
        // $validator = Validator::make($data,
        //     [
        //         'content' => 'required',
        //         'rating' => 'required',
        //     ],

        //     [
        //         'required' => ':attribute không được để trống',
        //     ],

        //     [
        //         'content' => 'nội dung không được để trống',
        //         'rating' => 'sao đánh giá không được để trống',
        //     ]
        // );
       
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }
        $review = Review::find($id);

        $review->content = $data['content'];
        $review->star = $data['rating'];

        $review->save();
        return redirect()->route('detail_product',['id' => $data['product_id'] ]);
    }
}
