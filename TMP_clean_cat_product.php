<?PHP

	include __DIR__."/backend/general.php";

	data_to_file(array(), __DIR__.CATEGORY);
	data_to_file(array(), __DIR__.PRODUCT);

	echo "Category and products database are cleaned\n";
?>
