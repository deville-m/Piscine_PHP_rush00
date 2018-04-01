<?PHP

@session_start();

include_once __DIR__."/../general.php";
include_once __DIR__."/is_visible.php";
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
			else if ($key && $cat_prod && @in_array($key, $cat_prod) && $item['quantity'] && $item['visible'])
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
}
?>
