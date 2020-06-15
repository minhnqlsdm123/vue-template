<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $posts = Post::with('category')->orderBy('id','desc')->paginate(5);
        return response($posts);
    }

    public function contact_us(){
        $contact=Contact::all();
        return response($contact);
    }

    public function article(){
        $posts = Post::with('category')->orderBy('id','desc')->get();
        return response($posts);
    }

    public function articleDetail($slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        return response($post);
    }

    public function filterByCategory($slug){
        $cate=Category::where('slug','=',$slug)->first();
        $post=Post::where('category_id','=',$cate['id'])->paginate('5');
        return response($post);
//        dd($cate);
    }
}
