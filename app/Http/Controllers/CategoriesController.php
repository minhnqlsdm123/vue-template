<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller implements iUploadImageManage
{
    public function __construct()
    {
//        $this->middleware('auth:api');

    }
    public function index(){
//        $categories = Category::all()->toArray();
//        return array_reverse($categories);
        $categories=Category::orderBy('id','desc')->paginate('3');
        dd($categories);
        return response($categories);
    }

    public function showAllCategory(){
        $categories=Category::all()->toArray();
        return array_reverse($categories);
    }

    public function form(Request $request){
        $this->validate($request,[
           'name'=>'required|string|unique:categories',
            'image'=>'required|image|mimes:jpeg,jpg,png'
        ]);
        $category = new Category();
        $category->name=$request->input('name');
        $category->slug=Str::slug($request->input('name'));
        $category->image=$this->uploadImage($request);
        $category->save();
        return response()->json('Add New Category Successfully !');
    }
//    public function edit($id){
//        $category=Category::findOrFail($id);
//        return response()->json($category);
//    }

    public function update(Request $request,$id){
        $category=Category::findOrFail($id);
        $this->validate($request,[
           'name'=>'required|string',
            'image'=>'required|image|mimes:jpeg,jpg,png'
        ]);
        unlink(public_path().$category->image);
        $category->name=$request->input('name');
        $category->slug=Str::slug($request->input('name'));
        $category->image=$this->uploadImage($request);
        $category->save();
        return response()->json('Update Category Successfully !');
    }

    public function delete($id){
        $category=Category::findOrFail($id);
        $category->delete();
        unlink(public_path().$category->image);
        return response()->json('Delete Category successfully !');
    }

    public function uploadImage(Request $request) {
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $time=Carbon::now()->format('YmdHis');
            $extension=$image->getClientOriginalExtension();
            $image_name=$time.".".$extension;
            $image->storeAs('public/images/category/',$image_name);
            $file="/storage/images/category/".$image_name;
            return $file;
        }
    }

    public function search($field,$query)
    {
        $category= Category::where($field,"LIKE","%$query%")
                            ->latest()->paginate(3);
        return response($category);
    }
}
