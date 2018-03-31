<?php

function file_to_data($file) {
	if (!file_exist($file))
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
	if (@file_put_contents($content, $file, LOCK_EX) === FALSE)
		return FALSE;
	return TRUE;
}

?>