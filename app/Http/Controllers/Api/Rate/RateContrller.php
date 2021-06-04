<?php

namespace App\Http\Controllers\Api\Rate;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreRate;
use App\Http\Requests\API\UpdateRate;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Work;
use App\Models\User;
use Auth;

class RateContrller extends Controller
{

    public function store(StoreRate $request)
    {
        $price_rate =0;
        $qul_rate   =0;
        $prs_rate   =0;


        $rate_check =  Rate::where('rated_id', $request->rated_id)->where('rater_id', Auth::user()->id)->first();

        if($rate_check)
        {

                 $rate_check->update([

                    'quality_rate'   => $request->quality_rate,
                    'price_rate'     => $request->price_rate,
                    'personal_rate'  => $request->personal_rate,
                    'comment'        => $request->comment,


                ]);

                $rate = $rate_check;

        }else
        {

                $rate = Rate::create([

                'quality_rate'   => $request->quality_rate,
                'price_rate'     => $request->price_rate,
                'personal_rate'  => $request->personal_rate,
                'comment'        => $request->comment,
                'rated_id'       => $request->rated_id,
                'rater_id'       => Auth::user()->id

                ]);

        }


        $rates = Rate::where('rated_id',$request->rated_id)->get();

        foreach($rates as $rat)
        {

            $price_rate  = ($rat->price_rate + $price_rate)/ (count(Rate::where('rated_id', $request->rated_id)->get()));
            $qul_rate    = ($rat->quality_rate + $qul_rate)/ (count(Rate::where('rated_id', $request->rated_id)->get()));
            $prs_rate    = ($rat->personal_rate + $prs_rate)/ (count(Rate::where('rated_id',$request->rated_id)->get()));

            $users=User::where('id',$request->rated_id)->first();
            if( $users)
            {
                $users->price_rate      =  $price_rate;
                $users->personal_rate   =  $prs_rate;
                $users ->quality_rate   =  $qul_rate;
                $users->save();
            }

        }


        return responseJeson(1,'التقييم',$rate);
    }




    public function update( UpdateOffer $request, $id)
    {
        $input = $request->all();

        $offer =Offer::find($id);

        if (empty($offer) ) {
            return responseJeson(0,'dontfound');
        }

        $offer ->update($input);
        return responseJeson(1,'تم التعديل بنجاح',$offer);

    }


}
