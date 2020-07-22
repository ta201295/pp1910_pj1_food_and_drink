<?php

namespace App\Helpers;
use Illuminate\Http\Request;

class Helper
{
    public static function uploadImage(Request $request, $fieldname = 'image')
    {
        if( $request->hasFile( $fieldname ) ) {

			$file = $request->file($fieldname)->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = $request->file($fieldname)->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
			$request->file($fieldname)->storeAs('public/img', $fileNameToStore);
			return $fileNameToStore ;
		}
    }
}