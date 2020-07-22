<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageTrait {
	function uploadImage(Request $request, $fieldname = 'image')
	{
		if( $request->hasFile( $fieldname ) ) {

			$file = $request->file($fieldname)->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = $request->file($fieldname)->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
			$request->file($fieldname)->move('image', $fileNameToStore);
			return $fileNameToStore ;
		}
	}

}
