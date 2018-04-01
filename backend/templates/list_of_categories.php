<?PHP

/*
 ** Needs to be updated with :
 ** 	- <a href="goto page of product" >
 */

include_once __DIR__."/../general.php";
include_once __DIR__."/is_visible.php";

if ($type === "category")
{
	if (($list = file_to_data(__DIR__."/../../private/category")) === false)
		return false;
	foreach ($list as $key => $item)
	{
		if ($item['visible'])
		{
			echo "<a href=\"index.php?type=category&id=".$key."\">
			<li class=\"".$type."\" id=\"\" >".
			$key."</li>
			</a>\n";
		}
	}
}
else if ($type === 'product')
{
	if ($id)
	{
		if (($list_cat = file_to_data(__DIR__."/../../private/category")) === false)
			return false;
		$cat_prod = $list_cat[$id];
		$cat_prod = $cat_prod['product'];
	}
	if (($list = file_to_data(__DIR__."/../../private/product")) === false)
		return false;
	foreach ($list as $key => $item)
	{
		if (is_visible($key))
		{
			if (!$id && $item['quantity'] && $item['visible'] )
			{
				echo "<a href=\"#".$type."_".$key."\">
					<li class=\"".$type."\" id=\"\" >".
					$key."</li>
					</a>\n";
			}
			else if ($key && $cat_prod && @in_array($key, $cat_prod) && $item['quantity'] && $item['visible'])
			{
				echo "<a href=\"#".$type."_".$key."\">
					<li class=\"".$type."\" id=\"\" >".
					$key."</li>
					</a>\n";
			}
		}
	}
}
?>
