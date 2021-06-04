<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Datatables\WorkDatatable;
use App\Datatables\OfferDatatable;
use App\Models\Work;
use App\Models\Offer;
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WorkDatatable $work)
    {
         return $work->render('admin.works.index');
    }

    public function workOffers( $id)
    {
         $offer = new OfferDatatable($id);
         return $offer->render('admin.works.work_offers');
    }


    public function activate($id)
    {
        $user = Work::findOrFail($id);
        $user->activate = 1;
        $user->save();

        flash()->success('تم التفعيل');
        return back();
    }
    public function deactivate($id)
    {
        $user = Work::findOrFail($id);
        $user->activate = 0;
        $user->save();

        flash()->success('تم إلغاء التفعيل');
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
