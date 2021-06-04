<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{


    //////////////////// Start Rigester ///////////////////////////
    public function register(StorUser $request)
    {

        $request->merge(['password'=>bcrypt($request->password)]);

        $user = User::create($request->all());
        $user->save();



        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return responseJeson(1, 'تم التسجيل بنجاح',[

            'user'  => $user,
            'token' => 'Bearer ' . $tokenResult
        ]);

    }

    //////////////////// End Rigester ///////////////////////////


    //////////////////// Start Login ///////////////////////////

    public function login (Request $request)
    {
        $validator = validator()->make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);

        if($validator->fails())
        {
            return responseJeson(0, $validator->errors()->first(), $validator->errors());
        }

        $user = User::where('email', $request->email)->first();


        if ($user)
        {

            if (Hash::check($request->password,$user->password))
            {

                if ($user->activate)
                {

                    $tokenResult = $user->createToken('authToken')->plainTextToken;

                     return responseJeson(1, 'تم التسجيل بنجاح',[
                        'user'  => $user,
                        'token' => 'Bearer ' . $tokenResult
                    ]);

                }else
                {
                    return responseJeson(0, 'هذا الحساب موقوف');
                }


            }
            else{

                return responseJeson(0, 'كلمة المرور غير صحيحة');

            }


        } else
        {
            return responseJeson(0, 'كلمة المرور غير صحيحة');
        }
    }

    //////////////////// End Login ///////////////////////////


}
