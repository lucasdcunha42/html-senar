<?php namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ImageHelperController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getImage(Request $request)
	{

		//$folder, $file, $width, $height, $action

		$folder = '/' . str_replace('.', '/', $request->get('d')) . '/';
		$width = $request->get('w', false);
		$height = $request->get('h', false);
		$file = $request->get('f');

		$action = $request->has('a') ? $request->get('a') : 'fit';

		// cache
		if($request->has('c'))
		{
			$img = Image::cache(function($image) use ($folder, $file) {
			   $img = $image->make(public_path() . $folder . $file);
			}, 10, true);
		}
		else
		{
			$img = Image::make(public_path() . $folder . $file);
		}

		if($width != false && $height != false)
		{

			if($action == 'crop')
			{
				$img->crop($width, $height);
			}

			if($action == 'fit')
			{
				$img->fit($width, $height);
			}

			if($action == 'rezise')
			{
				$img->rezise($width, $height);
			}
		}

		$response = $img->mime == 'image/jpeg' ? 'jpg' : 'png';

    	return $img->response($response);
	}

}
