<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Datatables\UserDatatable;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDatatable $user)
    {

         return $user->render('admin.users.index');

    }


    public function worker()
    {
        $records = User::where('type', 'worker')->with('categories')->get();
        $type = 'worker';
        return view('admin.users.index', compact('records', 'type'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $record = User::findOrFail($request->user_id);
        // Message::where('sender_id', $request->user_id)
        //         ->where('')
        $record->delete();
        flash()->success("تم الحذف بنجاح");
        return back();
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->activate = 1;
        $user->save();

        flash()->success('تم التفعيل');
        return back();
    }
    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->activate = 0;
        $user->save();

        flash()->success('تم إلغاء التفعيل');
        return back();
    }
}
