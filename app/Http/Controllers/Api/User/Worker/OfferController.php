<?php

namespace App\Http\Controllers\Api\User\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreOffer;
use App\Http\Requests\API\UpdateOffer;

use App\Models\Offer;
use App\Models\Work;
use Auth;

use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index($id)
    {
        $offer = Offer::where('work_id',$id)->with('user')->paginate(10);
        if (empty($offer))
        {
            return responseJeson(0,'لايوجد عرض');
        }

        return responseJeson(1,'success',$offer);
    }


    public function store(StoreOffer $request)
    {
        $offer = Auth::user()->offers()->create([

           'work_id'    =>$request->work_id,
           'content'    =>$request->content,
           'min_price'  =>$request->min_price,
           'max_price'  =>$request->max_price,
           'title'      =>$request->title,

        ]);

        return responseJeson(1,'success',$offer);
    }


    public function show($id)
    {

        $offer = Offer::find($id);

        if (empty($offer))
        {
            return responseJeson(0,'لايوجد عرض');
        }
        return responseJeson(1,'success',$offer);

    }


    public function update( UpdateOffer $request, $id)
    {

        $input = $request->all();

        $offer =Offer::find($id);

        if (empty($offer) )
        {
            return responseJeson(0,'لايوجد عرض');
        }

        $offer ->update($input);
        return responseJeson(1,'تم التعديل بنجاح',$offer);

    }



    public function destroy($id)
    {

        $offer = Offer::find($id);
        if (empty($offer))
        {
            return responseJeson(0,'لايوجد عرض');
        }

        $offer->delete();

        return responseJeson(1,'تم الحذف بنجاح');

    }
}
