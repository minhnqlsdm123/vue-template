<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('id','desc')->get();
        return response($posts);
    }

    public function contact(){
        $contacts=Contact::all();
        return response($contacts);
    }
}
