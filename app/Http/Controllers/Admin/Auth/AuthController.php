<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    public function profile()
    {
      $admin = auth()->guard('admin')->user();

      return view('admin.auth.profile',compact('admin'));

    }
    public function updateProfile(Request $request)
    {

      $client = Auth::guard('admin')->user();
      if($request->password)
      {
        $client->password=bcrypt($request->password);
      }

        $client->update($request->except('password'));

      return back();


    }
    public function login()
    {
      return view('admin.auth.login');

    }
    public function loginCheck(Request $request)
    {
      $rules = [
        'email'             =>'required|email',
        'password'          =>'required',
      ];

      $messages = [
        'email.required'    => 'الاميل يكون مطلوب',
        'password.required' => 'الباسورد يكون مطلوب'
      ];

      $this->validate($request, $rules, $messages);

      $credentials = [
        'email' => $request['email'],
        'password' => $request['password'],
    ];

    // Dump data
    $client = Admin::where('email',$request->email)->first();
    if($client)
    {



        if (Auth::guard('admin')->attempt($credentials))
        {
          return redirect(route('admin.home'));
        }
        else {
          flash()->error("البيانات غير صحيحة");
          return back();
        }


    }


    else {
      flash()->error("البيانات غير صحيحة");
      return back();
    }


 }

    public function logout()
    {
      auth()->guard('admin')->logout();
      return redirect(route('admin-login'));


    }

}
