<?PHP

/*
** Needs to be updated with :
** 	- <a href="goto page of product" >
*/

include __DIR__."/../general.php";

function create_div($item)
{
	return "toto le grand\n";
}

function display_categories()
{
	if (($products = file_to_data(__DIR__."/../../private/category")) === false)
		return false;
	foreach ($products as $item)
	{
		echo "<div class=\"tiles\">"."<img src=\"./img/toto1/vache.jpg\" height=\"100%\" />".create_div($item)."</div>";
	}
}
?>
<html>
<head>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<ul class="product_list">
<?PHP
	display_categories();
?>
	</ul>
</body>
</html>
