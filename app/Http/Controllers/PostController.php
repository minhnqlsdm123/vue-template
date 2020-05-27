<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('category')->orderBy('id','desc')->get();
        return response($posts);
    }

    public function form(Request $request){
//        dd($request->all());
        $this->validate($request,[
            'name'=>'required|string',

            'description'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|image',
        ]);
        $post = new Post([
            'name'=>$request->input('name'),

            'description'=>$request->input('description'),
            'content'=>$request->input('content'),
            'category_id'=>$request->input('category'),

        ]);
        $post->image=$this->uploadImage($request);

        $post->save();
        return response()->json('Add new Post Successfully !');
    }
    public function edit($id){
        $post=Post::findOrFail($id);
        return response()->json($post);
    }
    public function update(Request $request,$id){
            $post=Post::findOrFail($id);
            unlink(public_path().$post->image);
            $this->validate($request,[
            'name'=>'required|string',

            'description'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|image',
        ]);
       $post->name=$request->input('name');
       $post->description=$request->input('description');
       $post->content=$request->input('content');
       $post->category_id=$request->input('category');
        $post->image=$this->uploadImage($request);

        $post->save();
        return response()->json('Update Post Successfully !');
    }

    public function delete($id){
        $post=Post::findOrFail($id);
//        dd(public_path().$post->image);
        unlink(public_path().$post->image);
        $post->delete();
        return response()->json('Delete Post ');
    }

    public function uploadImage(Request $request) {
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $time=Carbon::now()->format('YmdHis');
            $extension=$image->getClientOriginalExtension();
            $image_name=$time.".".$extension;
            $image->storeAs('public/images/post/',$image_name);
            $file="/storage/images/post/".$image_name;

            return $file;
        }
    }
}
