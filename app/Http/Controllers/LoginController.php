<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        $categories = Category::all();
        return view('frontend.layout.ui.login',compact('categories'));
    }
    public function login_form(Request $request){

        $credentials = $request->only('email','password');

        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            // 'role'=>'required|in:0,1',
        ]);

        $user = User::where('email',$credentials['email'])->first();
        //dd($user->role);
        if($user && $credentials['password'] == $user->password){
            Auth::login($user);
            $request->session()->regenerate();
            session(['user_id' => $user->id,'user_name'=>$user->name]);
            if ($user->isAdmin()) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect()->route('login')->withErrors('Invalid credentials');
        }
        return back()->with('error','Invalid User Or Role');
    }
    public function logout(){
        Auth::logout();

        session()->invalidate();
        return redirect()->route('index');
    }
}
