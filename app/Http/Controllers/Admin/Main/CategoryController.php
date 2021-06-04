<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'parent' =>'sometimes|nullable',
        ];

        $messages = [
            'name.required' => 'اسم المدينة مطلوب',
        ];

        $this->validate($request, $rules, $messages);

        $record = Category::create($request->all());

        flash()->success("تم إضافة قسم بنجاح");

        return redirect(route('category.index'));
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
        $model = Category::find($id);
        return view('admin.categories.edit', compact('model'));
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
            'parent' => 'integer',

        ];

        $messages = [
            'name.required' => 'اسم القسم مطلوب',
            'parent.integer' => 'يجب عليك ادخال قسم واحد',
        ];

        $this->validate($request, $rules, $messages);

		Category::where('id', $id)->update($request->except(['_token', '_method' ]));
		session()->flash('success', 'تم التعديل بنجاح');
		return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function delete_parent($id) {

		$department_parent = Category::where('parent', $id)->get();
		foreach ($department_parent as $sub) {
			self::delete_parent($sub->id);
			$subdepartment = Category::find($sub->id);

		}
		$dep = Category::find($id);

		$dep->delete();
	}
	public function destroy($id) {
		self::delete_parent($id);
		session()->flash('success', 'تم الحذف بنجاح');
		return back();
	}
}
