<?php

define("PASSWD", "/../private/passwd");
define("PRODUCT", "/../private/product");
define("CATEGORY", "/../private/category");
define("ORDER", "/../private/order");


function file_to_data($file) {
	if (!file_exists($file))
		return FALSE;
	if (($content = @file_get_contents($file)) === FALSE)
		return FALSE;
	if (($data = @unserialize($content)) === FALSE)
		return FALSE;
	return $data;
}

function data_to_file($data, $file) {
	if (($content = @serialize($data)) === FALSE)
		return FALSE;
	if (@file_put_contents($file, $content, LOCK_EX) === FALSE)
		return FALSE;
	return TRUE;
}

function get_data_key_list($file) {
    $res = array();
    if (($data = file_to_data($file)) == FALSE)
        return FALSE;
    foreach ($data as $key => $value) {
        array_push($res, $key);
    }
    return ($res);
}

?>