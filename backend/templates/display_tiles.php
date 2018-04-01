<?PHP

/*
** Needs to be updated with :
** 	- <a href="goto page of product" >
*/

include __DIR__."/../general.php";

function create_div($item)
{
	return $item['name']."\n";
}

function display_categories($string)
{
	if ($string === "category")
	{
		if (($list = file_to_data(__DIR__."/../../private/category")) === false)
			return false;
	}
	else
	{
		if (($list = file_to_data(__DIR__."/../../private/product")) === false)
			return false;
	}
	foreach ($list as $item)
	{
		echo "<div class=\"tiles\">"."<img src=\"./img/toto1/vache.jpg\" height=\"100%\" width=\"auto\" />".create_div($item)."</div>";
	}
}
?>
<html>
<head>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<ul class="display_list">
<?PHP
	display_categories($type);
?>
	</ul>
</body>
</html>
