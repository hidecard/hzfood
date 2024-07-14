<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\Category;

class ItemController extends Controller
{
    public function admin_item() {
        $categories = Category::all();
        return view('admin.layout.product.index', compact('categories'));
    }
    public function item_list() {
        $itemlist = item::all();
        return view('admin.layout.product.itemlist', compact('itemlist'));
    }
    public function admin_item_insert(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|min:3',
            'quanity' => 'required|min:1',
            'img' => 'required|image'
        ]);

        $filename = null;
        if($request->hasFile('img')) {
            $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/images', $filename);
        }

        $post = item::create([
            'name' => $request->name,
            'item_price' => $request->price,
            'quanity' => $request->quanity,
            'img' => $filename,
            'stock' =>$request->stock,
            'category_id' => $request->category
        ]);

        return $post ?
            redirect()->back()->with('success', 'New post is added') :
            redirect()->back()->with('error', 'Failed to add post');
    }

    public function item_delete(Request $request) {
        $post = item::findOrFail($request->id);
        $post->delete();
        return redirect()->back()->with('success', 'Delete item Successful');
    }
    public function editem($id) {
        $result = Item::where('id', $id)->first();
        $categories = Category::all();
        $cat = Category::where('id', $result->category_id)->first();
        return view('admin.layout.product.editproduct', compact('result', 'cat', 'categories'));
    }

    public function edit_item(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|min:3',
            'quanity' => 'required|min:1',
            'img' => 'sometimes|image'
        ]);

        $post = Item::findOrFail($id);
        $filename = $post->img;
        if ($request->hasFile('img')) {
            $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/images', $filename);
        }

        $post->update([
            'name' => $request->name,
            'item_price' => $request->price,
            'quanity' => $request->quanity,
            'img' => $filename,
            'stock' => $request->stock,
            'category_id' => $request->category
        ]);

        return redirect()->back()->with('success', 'Item updated successfully');
}

}
