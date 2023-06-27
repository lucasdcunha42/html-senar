<?php namespace App\Lib;

class Img
{
	// To add more extensions we had to alterate the ImageHelperController responses.
	private $valid_extensions = ['jpg, png'];

	public static function url($folder, $file, $width = null, $height = null, $action = null, $cache = null)
	{

		$url = route('image') . '?d=' . $folder;
		$url .= '&f=' . $file;
		$url .= $width == null ? '' : '&w=' . $width;
		$url .= $height == null ? '' : '&h=' . $height;
		$url .= $action == null ? '' : '&a=' . $action;
		$url .= $cache == null ? '' : '&c=' . $cache;

		return $url;
	}

    public static function urlImage($file, $width = null, $height = null, $action = null, $cache = null)
    {
        return self::url('images', $file, $width, $height, $action, $cache);
    }

    public static function urlStorage($file, $width = null, $height = null, $action = null, $cache = null)
    {
        return self::url('storage', $file, $width, $height, $action, $cache);
    }

	/*public static function image($folder, $file, $width = null, $height = null, $action = null, $attributes = null)
	{
		$attr = is_array($attributes) && count($attributes) > 0 ? $attributes : false;
		$output_attr = '';

		if($attr)
		{
			foreach ($attr as $key => $value) {
				$output_attr .= ' ' . $key . '="' . $value '"';
			}
		}

		$url = static::url($folder, $file, $width = null, $height = null, $action = null);

		return '<img src="' . $url . '"' . $output_attr . ' alt="" />';
	}*/

}
