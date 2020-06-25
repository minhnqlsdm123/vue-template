<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    private $post;
    /**
     * UserApiController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
//        $this->middleware('auth');
        $this->post = $post;
    }
    public function index(){
        $posts = $this->post::with('category')->orderBy('id','desc')->paginate(5);
        return response($posts);
    }
    public function loadAllPost(){
        $posts = $this->post::with('category')->orderBy('id','desc')->get();
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
            'slug'=>Str::slug($request->input('name')),
            'description'=>$request->input('description'),
            'content'=>$request->input('content'),
            'category_id'=>$request->input('category'),
//            'image'=>$this->uploadImage($request)
        ]);
        $post->image=$this->uploadImage($request);

        $post->save();
        return response()->json('Add new Post Successfully !');
    }
    public function edit($id){
        $post=$this->post::findOrFail($id);
        return response()->json($post);
    }
    public function update(Request $request,$id){
            $post=$this->post::findOrFail($id);
            $this->validate($request,[
            'name'=>'required|string',
            'description'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|image',
        ]);
        unlink(public_path().$post->image);
       $post->name=$request->input('name');
       $post->slug=Str::slug($request->input('name'));
       $post->description=$request->input('description');
       $post->content=$request->input('content');
       $post->category_id=$request->input('category');
        $post->image=$this->uploadImage($request);

        $post->save();
        return response()->json('Update Post Successfully !');
    }

    public function delete($id){
        $post=$this->post::findOrFail($id);
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

    public function search($field,$query)
    {
        $category = Category::where('name','LIKE',"%$query%");
//        dd($category->id);
        $post = Post::with('category')
                    ->where($field,"LIKE","%$query%")
                    ->latest()
                    ->paginate(5);
        return response($post);
    }
}
