<?php

namespace App\Http\Controllers\Api\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;

class AdressController extends Controller
{
    public function governorates()
    {
        $govs = Governorate::all();
        return responseJeson(1, 'جميع المحافظات', $govs);
    }

    public function cities($id)
    {
        $cities = City::where('governorate_id', $id)->get();
        return responseJeson(1, 'جميع المدن', $cities);
    }
}
