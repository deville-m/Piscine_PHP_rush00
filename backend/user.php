<?php

function add_user($login, $passwd, $group) {
	if (!$login || !$passwd || !$group)
		return FALSE;
	if (($content = file_get_contents("../private/passwd")))
		
}

?>