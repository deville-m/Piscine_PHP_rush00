<?PHP
	include_once __DIR__.'/database.php';

	add_product("toto11", 1000, 1, "https://cdn.modernfarmer.com/wp-content/uploads/2015/08/cowburp.jpeg", true);
	add_product("toto12", 1000, 1, "http://s.newsweek.com/sites/www.newsweek.com/files/styles/full/public/2017/06/13/cow.jpg", true);

	add_product("toto21", 1000, 1, "http://static.cnewsmatin.fr/sites/default/files/styles/image_640_360/public/7790992493_vache-aubrac-affiche-salon-agri-2018-3361775_0.jpg?itok=J0uSXuU_", true);
	add_product("toto22", 1000, 1, "http://www.animaux-cie.com/images/header/vache.jpg", true);

	echo "4 products created\n";

	add_product_to_category("Normandes", "toto11");
	add_product_to_category("Normandes", "toto12"); 

	add_product_to_category("Jersey", "toto21");
	add_product_to_category("Jersey", "toto22"); 

	echo "Products added to categories\n";
?>
