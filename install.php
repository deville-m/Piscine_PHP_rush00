#! /usr/bin/php
<?php

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
$passwd['root'] = array(hash("whirlpool", "toor"), "admin");
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
echo "Initialization OK\n";

?>