<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Contact;
use Validator;


class MainController extends Controller
{
    //
    public function home(){
       $records=Work::where('activate',1)->with('categories')->get();

    return view('front.home',compact('records'));
    }
    public function contact(){
        return view('front.contact');
        }
     public function advertisements(){
            $records=Work::where('activate',1)->with('categories')->get();
            return view('front.adds',compact('records'));
            }
     public function ratings(){
                return view('front.ratings');
                }
     public function profile(){
            return view('front.profile');
              }
              public function contact_send(Request $request){


                        $inputs = [
                            'name' => 'required|string',
                            'email' => 'required|email',
                            'phone' => 'required',
                            'field' => 'required',
                            'content' => 'required'

                        ];
                        $validator = Validator::make($request->all(), $inputs, []);

                        if ($validator->fails()) {
                            return back()
                                ->withErrors($validator)
                                ->withInput();
                        }

                     $contact = new Contact();
                     $contact->name = $request->name;
                     $contact->email = $request->email;
                     $contact->phone =$request->phone;
                     $contact->field = $request->field;
                     $contact->content = $request->content;

                     $contact->save();
                     return back();




              }
}
