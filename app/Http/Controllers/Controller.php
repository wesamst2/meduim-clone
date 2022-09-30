<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload(Request $request, $field)
    {
        if($request->hasFile($field)) {
            //get filename with extension
            $filenamewithextension = $request->file($field)->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file($field)->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file($field)->storeAs('public/uploads', $filenametostore);

            $url = asset('storage/uploads/'.$filenametostore);

            return $url;
            return response()->json(
                ['url'=>$url]
            );
        }
        return null;
    }
}
