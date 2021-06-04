<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Datatables\ContactDatatable;
use App\Models\Setting;
class SettingController extends Controller
{
    public function edit($id)
    {
        $model = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('model'));
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'about_us'          => 'required',
            'phone'             => 'required',
            'email'             => 'required',
            'fb_link'           => 'required',
            'tw_link'           => 'required',
            'youtube_link'      => 'required',
            'inst_link'         => 'required',
            'whatsapp_link'     => 'required',
            'google_plus_link'  => 'required'
        ];

        $messages = [
            'about_us.required'         => 'Name is required',
            'phone.required'            => 'phone is required',
            'email.required'            => 'email is required',
            'fb_link.required'          => 'face book link is required',
            'tw_link.required'          => 'twitter link is required',
            'youtube_link.required'     => 'youtube link is required',
            'inst_link.required'        => 'inststgrame link is required',
            'whatsapp_link.required'    => 'whatsapp link is required',
            'google_plus_link.required' => 'google plus link is required'
        ];

        $this->validate($request, $rules, $messages);

        $record = Setting::findOrFail($id);
        $record->update($request->all());
        flash()->success("تم التعديل بنجاح");
        return back();
    }

    public function contacts(ContactDatatable $contacts)
    {

         return $contacts->render('admin.contacts.index');
    }
}
