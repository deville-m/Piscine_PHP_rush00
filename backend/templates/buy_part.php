<?PHP
function echo_buy($name)
{
	echo "<form action=\"api/add_to_basket.php\" method=\"POST\">\n";

	echo "<ul class=\"ul_line\">\n";

	echo "<li class=\"list_line_buy\">";
	echo "<input class=\"cow_quantity\" placeholder=\"How much?\" step=\"1\" type=\"number\" name=\"quantity\" min=\"1\"required>\n";
	echo "</li>\n";

	echo "<li class=\"list_line_buy\">";
	echo "<input class=\"cow_buy\" type=\"submit\" name=\"product\" placeholder=\"BUY\" value=\"".$name."\">\n";
	echo "</li>\n";

	echo "</ul>\n";

	echo "</form>";
}
?>
