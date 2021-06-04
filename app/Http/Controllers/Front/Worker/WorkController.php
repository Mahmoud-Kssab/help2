<?php

namespace App\Http\Controllers\Front\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Carbon\Carbon;
use Auth;
class WorkController extends Controller
{

    public function index()
    {
        $works = Work::where('status', 'open')->where('ex_date' ,'>=', Carbon::now())->where('activate', 1)->get();
        return view('front.workers.works', compact('works'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $work = Work::find($id);
        $offer = Auth::user()->offers()->where('work_id', $id)->first();
        return view('front.workers.work_det', compact('work', 'offer'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
