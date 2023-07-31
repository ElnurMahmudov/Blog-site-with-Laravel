<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Hash sınıfını ekledik

class AuthController extends Controller
{
  
    protected function redirectTo()
    {
        if (Auth::guard('admin')->check()) {
            return '/admin/dashboard';
        } else {
            return '/login';
        }
    }
    
    protected function loggedOut($request)
    {
        return redirect('/login');
    }


    public function login(){
        return view('back.auth.login');
    }

    public function loginPost(Request $request)
    {
        //burda auth attemp eslinde default users tablesine baxir qabaqina admin guard yazmamisdin
        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            toastr()->success('Admin panel bölməsində sizi xoş gördük!', 'Uğurlu giriş!');
            return redirect()->route('dashboard');
        }else {
            return redirect()->route('adminLogin')->with('danger','sehv parol ve ya email');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('adminLogin');
    }    

}
