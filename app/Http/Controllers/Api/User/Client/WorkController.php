<?php

namespace App\Http\Controllers\Api\User\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorWork;
use App\Http\Requests\Api\UpdateWork;
use Illuminate\Http\Request;
use App\Traits\mediaTrait;
use Illuminate\Database\Eloquent\Builder;

use Carbon\Carbon;
use App\Models\Work;
use Auth;

class WorkController extends Controller
{
    use mediaTrait;



    public function index(Request $request)
    {
        $works = Work::where( function(Builder $query) use($request){

            if($request->search)
            {
                return $query->where('title','LIKE', '%'. $request->search .'%')->where('user_id', Auth::user()->id);
            }

            if($request->category_id)
            {
                return $query->whereHas( 'categories' ,function (Builder $query) use($request){

                    $query->where('category_id', $request->category_id);

                })->where('user_id', Auth::user()->id);

            }else
            {
                return $query->where('user_id', Auth::user()->id);
            }



        })->with('categories')->with('user')->paginate(10);
        return responseJeson(1, 'حميع الاعلانات', $works );
    }


    public function create(StorWork $request)
    {


        $work = Auth::user()->works()->create([

            'title'         => $request->title,
            'des'           => $request->des,
            'seo_title'     => $request->title,
            'seo_des'       => $request->des,
            'seo_keywords'  => $request->title,
        ]);

        $date = $work->created_at;
        $date = $date->addDays($request->time);
        $work->ex_date = $date;
        $work->save();

        if($request->hasFile('image'))
        {
            $file_name = $this->saveFile($request->image, '/works');

            $work->media()->create([

                'url' => $file_name

            ]);
        }



        $work->categories()->attach($request->category_id);
        $work_categories = $work->categories()->get();
        $work_media = $work->media()->first();
        return responseJeson(1, 'تم اضافة اعلان',[

            'work'  => $work,
            'work_categories'  => $work_categories,
            'work_media'  => $work_media

        ] );

    }


    public function show($id)
    {
        $work = Work::where('id', $id)->with('categories')->paginate(10);
        return responseJeson(1, ' الاعلان الواحد', $work );
    }



    public function update(UpdateWork $request, $id)
    {

        $work = Work::find($id);

        if($request->hasFile('image'))
        {
            $old = $work->media()->first()->url;
            $file_name = $this->saveFile($request->image, '/works', $old);
            $work->media()->update([

                'url' => $file_name
            ]);
        }


        $work->update([

            'title'         => $request->title,
            'des'           => $request->des,
            'seo_title'     => $request->title,
            'seo_des'       => $request->des,
            'seo_keywords'  => $request->title,
            'ex_date'       => $request->ex_date,
            'status'        => $request->status

        ]);

        $work->categories()->sync($request->category_id);
        $work_categories = $work->categories()->get();
        $work_media = $work->media()->first();

        return responseJeson(1, 'تم اضافة اعلان',[

            'work'  => $work,
            'work_categories'  => $work_categories,
            'work_media'  => $work_media

        ] );
    }


    public function destroy($id)
    {

        $work = Work::find($id);
        if($work)
        {
            $work->delete();
            return responseJeson(1, 'تم الحذف بنجاح' );
        }

        return responseJeson(0, 'هذا الاعلان غير موجود' );
    }


    public function offers($id)
    {
        $offer = Work::where('id', $id)->with('offers')->paginate(10);
        return responseJeson(1, 'جميع العروض لهذا الاعلان', $offer );
    }


}
