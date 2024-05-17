<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\PostCreated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function store(Request $request)
    {

        

        // $post_data = $request->validate([
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ]);

        $post_data = $request->all();

        // dd($request['title']);
        



        $post_data['user_id'] = auth()->user()->id;
        

        // dd($post_data);

        Post::create($post_data);

        $data = ['title' => $post_data['title'], 'user' => auth()->user()->name];

        event(new PostCreated($data)); 

        // return redirect()->back()->withSuccess('post created successfully');

        return response()->json([
            'status' => 'post created done.'
        ]);

    }




}
