<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use DB;

class MainController extends Controller
{
    public function index()
    {
       $sucess = Work::select('status', \DB::raw("COUNT('id') as count"))
       ->groupBy('status')
       ->get();


       $all_works = Work::count();


    //    dd($sucess);
    //    $sucess = $sucess->count() / $all_works;



           $works=Work::select(
               DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->
               groupBy(DB::raw('MONTH(created_at)'))->pluck('count');
           ;
           $months=Work::select(
           DB::raw("MONTH(created_at) as month"))->whereYear('created_at',date('Y'))->
           groupBy(DB::raw('MONTH(created_at)'))->pluck('month');

           $dates=array(0,0,0,0,0,0,0,0,0,0,0,0);
           foreach($months as $index=>$month)
           {

           $dates[$month]=$works[$index];

           }


               return view('admin.home',compact('dates','sucess'));

           }

}
