<?php

namespace App\Http\Controllers\Front\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\mediaTrait;
use App\Models\Message;
use App\Models\User;
use Auth;

class MessageController extends Controller
{
    use mediaTrait;

    public function index($id)
    {
        $id = (int)$id;
        $users = User::where('id', '!=', Auth::user()->id )->where('type', '!=', Auth::user()->type)->get();

        $mess = Message::where(function($q) use( $id){

            $q->where(function($q) use( $id){
                $q->where('sender_id', Auth::user()->id)
                ->where('receiver_id', $id);

            });

            $q->orWhere(function($q) use($id){
                $q->where('receiver_id', Auth::user()->id)
                ->where('sender_id', $id);

            });

        })->orderBy('id', 'asc')->get();


        $receiver_id = $id;
        return view('front.messages.chat', compact('mess', 'receiver_id', 'users'));
    }


    public function create(Request $request)
    {


        if($request->content)
        {
            $mes = Message::create([

                'sender_id'     => $request->sender_id,
                'receiver_id'   => $request->receiver_id,
                'content'       => $request->content
            ]);

        }else
        {
            $mes = Message::create($request->except(['files']));
        }



        $arr_img = [];

        if($request->has('files'))
        {
            $files = $request->file('files');
            foreach ($files as $file) {
                $file_name = $this->saveFile($file, '/messages');
                 array_push($arr_img,  $file_name);
                $mes->medias()->create([

                    'url'  =>  $file_name
                ]);


            }
        }



        if($mes)
        {

            if($arr_img)
            {

                return response()->json([
                    'status'=> 1,
                    'data'  => [

                        'mes'      => $mes,
                        'arr_img'  => $arr_img
                    ]
                ]);

            }

            return response()->json([
                'status'=> 1,
                'data'  => [

                    'mes'      => $mes,

                ]
            ]);


        }else
        {
            return response()->json([
                'status'=> 0
            ]);
        }
    }





}
