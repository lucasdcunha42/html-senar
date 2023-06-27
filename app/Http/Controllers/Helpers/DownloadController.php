<?php namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadController extends Controller {

	public function download()
	{
        $path = request()->get('file', null);

        if(!$path) abort(404);

        $path = str_replace('\\', '/', $path);

        return response()->download(storage_path('app/public/' . $path));
	}
}
