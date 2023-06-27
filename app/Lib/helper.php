<?php

if ( ! function_exists('urlImage'))
{
	function urlImage($file, $width = null, $height = null, $action = null, $cache = null)
	{
		return \App\Lib\Img::urlImage('images', $file, $width, $height, $action, $cache);
	}
}

if ( ! function_exists('urlStorage'))
{
	function urlStorage($file, $width = null, $height = null, $action = null, $cache = null)
	{
		return \App\Lib\Img::url('storage', $file, $width, $height, $action, $cache);
	}

}

if ( ! function_exists('imgSetting'))
{
	function imgSetting($key)
	{
		return asset('storage/' . setting($key));
	}

}


