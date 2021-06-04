<?php

namespace App\Http\Controllers\Front\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\mediaTrait;

use App\Http\Requests\Api\StorWork;
use App\Http\Requests\UpdateWork;

use App\Models\Category;
use App\Models\Work;
use App\Models\Offer;
use Auth;

class WorkController extends Controller
{
    use mediaTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $records=Work::get();

       $categories=Category::where('parent',null)->get();

        return view('front.clients.addwork',compact('categories','records'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorWork $request)
    {



        if($request->status=="on")
        {
            $status = 'open';
        }else
        {
            $status = 'close';
        }
        $work = Work::create([

            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'des'=>$request->des,
            'seo_title'=>$request->title,
            'seo_des'=>$request->des,
            'des'=>$request->des,
            'address'=>$request->address,
            'ex_date'=>$request->ex_date,
            'status'=>$status

        ]);

        $cat=$request->category_id;
        $work->categories()->attach($request->category_id);

        $file_name = $this->saveFile($request->image, '/works');
        $work->media()->create([

            'url'  =>  $file_name
        ]);
        flash()->success("تم إضافة اعلان بنجاح");
        return back();


    }

    public function getjson(Request $request)
    {
      $cat = Category::where('parent',$request->parent)->get();


      $response    = [
         'status'  => 1,
         'message' =>'sucess',
         'data'    => $cat
       ];
         return response()->json($response);
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
        $record = Work::findorfail($id);
        $categories = Category::where('parent',null)->get();
        $selectedId = $record->categories()->first()->where( 'parent', null )->first()->id;
        $sub_categories = Category::where('parent', $selectedId)->get();
        $selectedId2 = $record->categories()->first()->where( 'parent', '!=' ,null )->first()->id;
        return view('front.clients.editwork',compact( 'record', 'categories','selectedId', 'selectedId2', 'sub_categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWork $request,$id)
    {

        $model=Work::findorfail($id);

        if($request->status=="on")
        {
            $status = 'open';
        }else
        {
            $status = 'close';
        }

        $model->update([

         'title'=>$request->title,
         'des'=>$request->des,
         'seo_title'=>$request->title,
         'seo_des'=>$request->des,
         'des'=>$request->des,
         'address'=>$request->address,
         'ex_date'=>$request->ex_date,
         'status'=>$status

        ]);

        $model->first()->categories()->sync($request->category_id);

        if($request->image != null)
        {
            $old = $model->media()->first()->url;
            $file_name = $this->saveFile($request->image, '/works', $old);
            $model->media()->update([

                'url'  =>  $file_name
            ]);
        }


        $model->save();
        flash()->success("تم التعديل بنجاح");
        return  back();
    }




    public function destroy(Request $request)
    {

        $work = Work::find($request->work_id);
        $work->categories()->detach();
        $work->delete();
        flash()->success('تم حذف الاعلان ');
        return back();

    }

    public function showwork($id)
    {
        $work = Work::findOrFail($id);
        $work->status='open';
        $work->save();
        flash()->success('تم تفعيل الاعلان ');
        return back();
    }

    public function hidework($id)
    {
        $work = Work::findOrFail($id);
        $work->status='close';
        $work->save();
        flash()->success('تم غلق  الاعلان ');
        return back();
    }

    public function offeruser(Request $request,$id){
        $offer=Offer::where('work_id',$request->id)->get();


       return view('front.clients.alloffers',compact('offer'));


 }
}
