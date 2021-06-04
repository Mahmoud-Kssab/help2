<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\DataTables\GovernorateDatatable;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GovernorateDatatable $gov)
   {

        return $gov->render('admin.governorates.index');

        // return view('layouts.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:governorates,name'
          ];

          $messages = [
            'name.required' => 'اسم محافظة مطلوب',
            'name.unique' => 'اسم المحافظة موجود بالفعل '
          ];

          $this->validate($request, $rules, $messages);

          $record = Governorate::create($request->all());

          flash()->success("تم إضافة محافظة بنجاح");

          return redirect(route('governorate.index'));
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
        $model = Governorate::findOrFail($id);
        return view('admin.governorates.edit', compact('model'));
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
        $rules = [
            'name' => 'required|unique:governorates,name,'.$id
        ];

        $messages = [
            'name.required' => 'اسم محافظة مطلوب',
            'name.unique' => 'اسم المحافظة موجود بالفعل '
        ];
        $this->validate($request, $rules, $messages);

        $record = Governorate::findOrFail($id);
        $record->update($request->all());
        flash()->success("تم التعديل بنجاح");
        return redirect(route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $record = Governorate::findOrFail($request->gov_id);
        $record->delete();
        flash()->success("تم الحذف بنجاح");
        return back();
    }
}
