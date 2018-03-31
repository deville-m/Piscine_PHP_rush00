#! /usr/bin/php
<?php

function set_macros($macro_name, $content)
{
	return "define('".$macro_name."', '".$content."');\n";
}

if (@mkdir("private") === FALSE)
	exit ("FATAL ERROR: cannot make private directory\n");
if (@touch("private/passwd") === FALSE)
	exit ("FATAL ERROR: cannot create passwd file.\n");
if (@touch("private/category") === FALSE)
	exit ("FATAL ERROR: cannot create category file\n");
if (@touch("private/order") === FLASE)
	exit ("FATAL ERROR: cannot create order file\n");
if (@touch("private/product") === FALSE)
	exit ("FATAL ERROR: cannot create product filen\n");
$passwd = array();
$passwd['root'] = array("passwd" => hash("whirlpool", "toor"), "group" => "admin");
if (($serial = @serialize($passwd)) === FALSE)
	exit ("FATAL ERROR: cannot serialize root user");
if (@file_put_contents("private/passwd", $serial) === FALSE)
	exit ("FATAL ERROR: could not write serial to passwd");
if (@file_put_contents("private/category", "a:0:{}") === FALSE)
	exit ("FATAL ERROR: could not write serial to category");
if (@file_put_contents("private/order", "a:0:{}") === FALSE)
	exit ("FATAL ERROR: could not write serial to corder");
if (@file_put_contents("private/product", "a:0:{}") === FALSE)
	exit ("FATAL ERROR: could not write serial to product");

if (($path = @getcwd()) === false)
	exit ("FATAL ERROR: could not get path");
$path = set_macros("ROOT", $path."/");

$php_open = "<PHP\n";
$php_close = "?>\n";

$macro = "";
$macro = $macro.$path;

if (@file_put_contents("private/env.php", $php_open.$macro.$php_close) === FALSE)
	exit ("FATAL ERROR: could not write env file");

echo "Initialization OK\n";

?>
