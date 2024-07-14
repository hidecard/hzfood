<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    public function admin(){
        $result = User::where('role',0)->get();
        // dd($result);
         return view('admin.layout.admin.admin',compact('result'));
    }
    public function edit($id){
        // dd($id);
        $result = User::where('id',$id)->get();
        return view('admin.layout.admin.edit',compact('result'));
    }
    public function admin_create(Request $request){
        // dd($request->all());

        $validate = validator($request->all(),   [
            'name'=> 'required | min:3',
            'email'=> 'required|email|unique:users,email',
            'phone' => 'required|min:9',
            'password'=>'required|min:4'
        ]);
        if($validate->fails()){
            return back()->withErrors($validate);
        }
        $post = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=>$request->phone,
            'password'=> $request->password,
            'role'=> 0
        ]);
        if($post){
             return redirect()->back()->with('success', 'success!!');
        }else{
            dd('failed');
        }
    }
        public function admin_delete(Request $request){
            // dd($request->all());
            $id = $request -> id;
            $record = User::find($id);
            if($record){
                $record->delete();
             return redirect()->back()->with ('success', 'Delete Account Succeful');
            }else{
                return redirect()->back()->with ('error', 'Record Not Found');
            }
        }
        public function admin_update_code(Request $request, $id){
            $validate = validator($request->all() ,[
                'name' => 'required|min-3',
                'email'=> 'required|unique:users,email',
                'phone' => 'required',
                'old_password'=> 'nullable|min:4',
                'new_password'=> 'nullable|min:4',
            ]);
            $admin = User::find($id);
            if($request->filled('old_password')){
                if(Hash::check($request->old_password , $admin->password)){
                    $new_password = Hash::make($request->new_password);
                }else{
                    return back()->withErrors('Password does not match');
                }
            }
            if($admin){
                if($request->filled('old_password')){
                    $admin->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'password'=>$request->new_password,
                    ]);
                }else{
                    $admin->update([
                        'name'=>$request->name,
                        'phone'=>$request->phone,
                        'email'=>$request->email,
                    ]);
                }
                return redirect()->back()->with('success','Edit Success');
            }
            else{
                return redirect()->back()->with('error','Password or email do not match');
            }
    }
}
