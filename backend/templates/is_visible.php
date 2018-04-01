<?PHP
	include_once (__DIR__."/../general.php");

	function is_visible($needle)
	{
		if (($list = file_to_data(__DIR__."/../../private/category")) === false)
			return false;
		foreach ($list as $key => $item)
		{
			foreach ($item['product'] as $cows)
			{
				if ($cows === $needle)
				{
					if ($item['visible'])
						return true;
				}
			}
		}
		return false;
	}
?>
