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
	foreach ($list as $key => $item)
	{
		echo "<a href=\"index.php?type=category&id=".$key."\">
			<li class=\"".$type."\" id=\"\" >".
			$key."</li>
			</a>\n";
	}
}
else if ($type === 'product')
{
	if ($id)
	{
		if (($cat_prod = file_to_data(__DIR__."/../../private/category")) === false)
			return false;
		$cat_prod = $cat_prod[$id];
		$cat_prod = $cat_prod['product'];
	}
	if (($list = file_to_data(__DIR__."/../../private/product")) === false)
		return false;
	foreach ($list as $key => $item)
	{
		if (!$id)
		{
			echo "<a href=\"#".$type."_".$key."\">
				<li class=\"".$type."\" id=\"\" >".
				$key."</li>
				</a>\n";
		}
		else if (in_array($key, $cat_prod))
		{
			echo "<a href=\"#".$type."_".$key."\">
				<li class=\"".$type."\" id=\"\" >".
				$key."</li>
				</a>\n";
		}
	}
}
?>
