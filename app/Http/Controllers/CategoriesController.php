<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all()->toArray();
        return array_reverse($categories);
    }

    public function form(Request $request){
        $this->validate($request,[
           'name'=>'required|string|unique:categories'
        ]);
        $category = new Category();
        $category->name=$request->input('name');
        $category->slug=Str::slug($request->input('name'));
        $category->save();
        return response()->json('Add New Category Successfully !');
    }

    public function edit($id){
        $category=Category::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request,$id){
        $category=Category::findOrFail($id);
        $this->validate($request,[
           'name'=>'required|string|unique:categories'
        ]);
        $category->name=$request->input('name');
        $category->slug=Str::slug($request->input('name'));
        $category->save();
        return response()->json('Update Category Successfully !');



    }

    public function delete($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return response()->json('Delete Category successfully !');
    }
}
