<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function admin_category(){
        $result = Category::get();
        return view('admin.layout.category.index' ,  compact('result'));
    }
    public function edit_category($id){
        $result = Category::where('id',$id)->get();
        return view('admin.layout.category.editcat',compact('result'));
    }
    public function admin_category_insert(Request $request){
        $validate = validator($request->all(), [
            'category_name'=> 'required|min:2'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate);
        }
        $post = Category::create([
            'category_name'=> $request->category_name
        ]);
        if($post){
            return redirect()->back()->with('success','New Category Is Added');
        }
    }
    public function update_category(Request $request, $id) {
        $request->validate([
            'category_name' => 'required|min:2'
        ]);

        $post = Category::findOrFail($id);
        $post->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->route('admin_category')->with('success', 'Category updated successfully');
    }
}
