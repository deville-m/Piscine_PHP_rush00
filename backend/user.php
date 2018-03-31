<?php

function add_user($login, $passwd, $group) {
	if (!$login || !$passwd || !$group)
		return FALSE;
	if (($content = file_get_contents("../private/passwd")) === FALSE)
		return FALSE;
	if (($data = @unserialize($content)) === FALSE || isset($data[$login]))
		return FALSE; 
	$data[$login] = array();
	$data[$login]['passwd'] = hash("whirlpool", $passwd);
	$data[$login]['group'] = $group;
	if (($content = @serialize($data)) === FALSE)
		return FALSE;
	if (file_put_contents("../private/passwd", $content, LOCK_EX) === FALSE)
		return FALSE;
	return TRUE;
}

function auth($login, $passwd) {
	if ($login == "" || $passwd == "")
		return FALSE;
	if (($content = @file_get_contents("../private/passwd")) === FALSE)
		return FALSE;
	if (($data = @unserialize($content)) === FALSE)
		return FALSE;
	$passwd = hash("whirlpool", $passwd);
	if ($data[$login]['passwd'] === $passwd)
		return TRUE;
	else
		return FALSE;
}

function remove_user($login) {
	if ($login == "")
		return FALSE;
	if (($content = file_get_contents("../private/passwd")) === FALSE)
		return FALSE;
	if (($data = @unserialize($content)) === FALSE)
		return FALSE; 
	@unset($data[$login]);
	if (($content = @serialize($data)) === FALSE)
		return FALSE;
	if (file_put_contents("../private/passwd", $content, LOCK_EX) === FALSE)
		return FALSE;
	return TRUE;
}

function modif_pwd($login, $oldpwd, $newpwd) {
	if ($login == "" || $oldpwd == "" || $newpwd == "")
		return FALSE;
	if (($content = file_get_contents("../private/passwd")) === FALSE)
		return FALSE;
	if (($data = @unserialize($content)) === FALSE || !isset($data[$login]) || !isset($data[$login]['passwd']))
		return FALSE;
	$oldpwd = hash("whirlpool", $oldpwd);
	if ($data[$login]['passwd'] !== $oldpwd)
		return FALSE;
	$data[$login]['passwd'] = hash("whirlpool", $newpwd);
	if (($content = @serialize($data)) === FALSE)
		return FALSE;
	if (file_put_contents("../private/passwd", $content, LOCK_EX) === FALSE)
		return FALSE;
	return TRUE;
}

?>