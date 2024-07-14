<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auth;
use App\Models\Category;
class UserController extends Controller
{
    public function admin_user(){
        $result = User::where('role',1)->get();
        // dd($result);
        return view('admin.layout.user.user',compact('result'));
    }

    public function user_register_form(){
        $categories = Category::all();
       
        return view('frontend.register',compact('categories'));
    }
    public function user_register(Request $request){
        $validate= validator($request->all(),[
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4',
        'phone' => 'required|min:9'
    ]);


    if($validate->fails()){
        return back()->withErrors($validate);
    }
    $post = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        'phone'=>$request->phone,
        'role'=>1
    ]);
    if($post){
        return redirect()->back()->with('success','success!!');
    }else{
        dd('failed');
    }
}
    public function user_delete(Request $request){
        $id = $request->id;
        $record=User::find($id);
        if($record){
            $record -> delete();
            return redirect()->back()->with('success','Delete Account Succeful');
        }else{
            return redirect()->back()->with('error','Record Not Found');
        }
    }
    public function user_update_code(Request $request, $id){
        $validate = validator($request->all() ,[
            'name' => 'required|min-3',
            'email'=> 'required|unique:users,email',
            'old_password'=> 'nullable|min:4',
            'new_password'=> 'nullable|min:4',
            'phone' => 'required|min:9',
        ]);
        $User = User::find($id);
        if($request->filled('old_password')){
            if(Hash::check($request->old_password , $admin->password)){
                $new_password = Hash::make($request->new_password);
            }else{
                return back()->withErrors('Password does not match');
            }
        }
        if($user){
            if($request->filled('old_password')){
                $user->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$request->new_password,
                    'phone'=>$request->phone,
                ]);
            }else{
                $user->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,

                ]);
            }
            return redirect()->back()->with('success','Edit Success');
        }
        else{
            return redirect()->back()->with('error','Password or email do not match');
        }
}
}
