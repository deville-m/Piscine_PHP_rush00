<?php

include("general.php");

/*
 * @author ctrouill
 * @docs add product to serialized file database
 * @params product_id id of the product to store
 * @params name product name to store
 * @params quantity of product to store
 * @params image relative path to the assets folder of product
 * @params visible boolean
 * return boolean of compution success
 */
function add_product($product_id, $name,
                     $price, $quantity,
					 $image, $visible)
{
	foreach (func_get_args() as $k)
	{
		if (!$k || $k === "")
			return false;
    }
    if (($products = file_to_data(__DIR__."/../private/product")) === FALSE)
		return false;
	echo "ERROR1\n";
    if ($products[$product_id] != NULL) {
        return false;
	}

	print_r($products);

    $products[$product_id] = array();
    $products[$product_id]['name'] = $name;
    $products[$product_id]['price'] = $price;
    $products[$product_id]['quantity'] = $quantity;
    $products[$product_id]['image'] = $image;
    $products[$product_id]['visible'] = $visible;
    if (!data_to_file($products, __DIR__."/../private/product"))
        return false;
    return true;
}

/*
 * @author ctrouill
 * @docs remove products
 * @params product_id id to remove
 * @return boolean of computation success
 */
function remove_product($product_id) {
    if (!$product_id)
        return false;
    if (($products = data_to_file(__DIR__."/../private/product")) === FALSE)
        return false;
    unset($products[$product_id]);
    if (!data_to_file(__DIR__."/../private/product"))
        return false;
    return true;
}
?>
