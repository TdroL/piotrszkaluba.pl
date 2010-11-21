<?php defined('SYSPATH') or die('No direct script access.');

class Text extends Kohana_Text
{
	public static function normalize($string, $encoding = 'utf-8')
	{
		$string = iconv($encoding, 'ascii//translit', $string);

		$string = utf8::str_ireplace(',', '', $string);
		$string = utf8::str_ireplace('\'', '', $string);

		$string = preg_replace('/[^a-z0-9-\+\/_ ]/iUD', '_', $string);

		return $string;
	}
}