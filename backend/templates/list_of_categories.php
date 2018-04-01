<?PHP

/*
** Needs to be updated with :
** 	- <a href="goto page of product" >
*/

include_once __DIR__."/../general.php";

if ($type === "category")
{
	if (($list = file_to_data(__DIR__."/../../private/category")) === false)
		return false;
}
else if ($type === 'product')
{
	if (($list = file_to_data(__DIR__."/../../private/product")) === false)
		return false;
}
if ($list)
{
	foreach ($list as $key => $item)
	{
		echo "<a href=\"#\"><li class=\"".$type."\">".$key."</li></a>\n";
	}
}
?>
