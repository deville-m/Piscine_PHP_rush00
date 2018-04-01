<?PHP
function echo_buy()
{
	echo "<form action=\"add_to_basket.php\" method=\"POST\">\n";

	echo "<ul class=\"ul_line\">\n";

	echo "<li class=\"list_line\">";
	echo "<input class=\"cow_quantity\" type=\"number\" name=\"quantity\" min=\"1\"required>\n";
	echo "</li>\n";

	echo "<li class=\"list_line\">";
	echo "<input class=\"cow_buy\" type=\"submit\" name=\"product\" placeholder=\"BUY\" value=\"".$key."\">\n";
	echo "</li>\n";

	echo "</ul>\n";

	echo "</form>";
}
?>
