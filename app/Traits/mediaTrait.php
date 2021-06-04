<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

Trait mediaTrait
{
    function saveFile($file, $folder, $old=null)
    {

        $path = public_path();
        $destinationPath = $path . '/uploads' .$folder; // upload path
        $logo = $file;
        $extension = $logo->getClientOriginalExtension(); // getting image extension
        $file_name = '/uploads' .$folder . '/'.time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image

        $logo->move($destinationPath, $file_name); // uploading file to given path

        if($old != null)
        {
            Storage::disk('public_uploads')->delete($old);
        }

        return $file_name;
    }

}
