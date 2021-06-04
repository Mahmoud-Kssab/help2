<?php

namespace App\Http\Controllers\Api\User\Worker;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Offer;
use App\Models\Work;

use Illuminate\Http\Request;

class WorkController extends Controller
{

     public function get_works(Request $request)
     {

        $works = Work::where( function(Builder $query) use($request){

            if($request->search)
            {
                 $query->where('title','LIKE', '%'. $request->search .'%')->where('ex_date' ,'>=', Carbon::now())->where('activate', 1)->where('status','open');
            }

            if($request->category_id)
            {
                 $query->whereHas( 'categories' ,function (Builder $query) use($request){

                    $query->where('category_id', $request->category_id)
                          ->where('ex_date' ,'>=', Carbon::now())->where('activate', 1)->where('status','open');

                });

            }else
            {
                 $query->where('ex_date' ,'>=', Carbon::now())->where('activate', 1)->where('status','open');
            }



        })->paginate(10);
        return responseJeson(1, 'حميع الاعلانات', $works );

        if (empty($works))
        {
            return responseJeson(0,'لايوجد اعلانات');
        }
        return responseJeson(1,'الاعلانات',$works);

     }


     public function show_works($id)
     {

        $work = Work::where('id', $id)->with('user')->first();
        if (empty($work))
        {
            return responseJeson(0,'لايوجد اعلان');
        }

        return responseJeson(1,'الاعلان',$work);

     }





}
