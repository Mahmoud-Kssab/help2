<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
use App\DataTables\CityDatatable;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CityDatatable $city)
   {

        return $city->render('admin.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
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
            'name' => 'required',
            'governorate_id' =>'required',
        ];

        $messages = [
            'name.required' => 'اسم المدينة مطلوب',
            'governorate_id.required' => 'يجب عليك ادخال المحافظة'
        ];

        $this->validate($request, $rules, $messages);

        $record = City::create($request->all());

        flash()->success("تم إضافة مدينة بنجاح");

        return redirect(route('city.index'));
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
        $model = City::findOrFail($id);

        $governorates = Governorate::pluck('name', 'id');

        $selectedID = $model->governorate->id;

        return view('admin.cities.edit', compact('model','governorates','selectedID'));
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
            'name' => 'required',
            'governorate_id' =>'required',
        ];

        $messages = [
            'name.required' => 'اسم المدينة مطلوب',
            'governorate_id.required' => 'يجب عليك ادخال المحافظة'
        ];

        $this->validate($request, $rules, $messages);

      $record = City::findOrFail($id);
      $record->update($request->all());
      flash()->success("تم التعديل بنجاح");
      return redirect(route('city.index'));
    }

    public function destroy($id, Request $request)
    {
      $record = City::findOrFail($request->city_id);
      $record->delete();
      flash()->success("تم الحذف بنجاح");
      return back();
    }
}
