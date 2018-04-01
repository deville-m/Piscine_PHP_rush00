<?PHP

@session_start();
/*
 ** Needs to be updated with :
 ** 	- <a href="goto page of product" >
 */

include_once __DIR__."/../general.php";
include_once __DIR__."/buy_part.php";

if ($type === "category")
{
	if (($list = file_to_data(__DIR__."/../../private/category")) === false)
		return false;
	foreach ($list as $key => $item)
	{
		if ($item['visible'])
		{
			echo "<a href=\"/index.php?type=".$type."&id=".$key."\"><li class=\"tiles\"
			id=\"".$type."_".$key."\"
			>".
			"<img src=\"".
			$item["image"].
			"\" /><br>".
			"<p>".
			$key.
			"</p>
			</li></a>";
		}
	}

}
else if ($type === "product")
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
		if (!$id && $item['quantity'] && $item['visible'])
		{
			echo "<li class=\"tiles\"
				id=\"".$type."_".$key."\"
				>";
			echo_buy($key);
			echo "<img src=\"".
				$item["image"].
				"\" /><br>".
				"<p>".
				$key.
				"</p>
				<p>".$item['price']."€</p>
				</li></a>";
		}
		else if (in_array($key, $cat_prod) && $item['quantity'] && $item['visible'])
		{
			echo "<li class=\"tiles\"
				id=\"".$type."_".$key."\"
				>";
			echo_buy($key);
			echo "<img src=\"".
				$item["image"].
				"\" /><br>".
				"<p>".
				$key.
				"</p>
				<p>".$item['price']."€</p>
				</li>";
		}
	}
}
?>
