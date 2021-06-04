<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function city(Request $request)
    {
      $cities = City::where(function($q) use( $request){

        if($request->has('governorate_id'))
        {
          $q->where('governorate_id', $request->governorate_id);
        }
      })->get();
      $response    = [
         'status'  => 1,
         'message' =>'sucess',
         'data'    => $cities
       ];
         return response()->json($response);
        }

}
