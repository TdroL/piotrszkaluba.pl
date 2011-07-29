<?php defined('SYSPATH') or die('No direct script access.');

echo json_encode(array(
	'title' => $title,
	'content' => (string) $content
));
