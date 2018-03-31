<?PHP

/*
** Needs to be updated with :
** 	- <a href="goto page of product" >
*/

include __DIR__."/../general.php";

function list_categories()
{
	if (($products = file_to_data(__DIR__."/../../private/category")) === false)
		return false;
	foreach ($products as $item)
	{
		echo '<li class="categories">'.$item['name'].'</li>'."\n";
	}
}
?>
<html>
<head>
<link rel="stylesheet" href="<?PHP__DIR__.'/../../css/main.css'?>">
	<style>
		.cat_list {
			list-style: none;
			margin: 0;
			padding: 0;
		}
	
		.categories {
			font-family: Lato, sans-serif;
		}
	</style>
</head>
<body>
	<ul class="cat_list">
		<?PHP
			list_categories();
		?>
	</ul>
</body>
</html>
