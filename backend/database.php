<?php

include(__DIR__ . "/general.php");

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
function add_product($name, $price, $quantity, $image, $visible)
{
	foreach (func_get_args() as $k)
	{
		if (!$k || $k === "")
			return false;
    }
    if (($products = file_to_data(__DIR__ . PRODUCT)) === FALSE)
		return false;
    if ($products[$product_id] != NULL) {
        return false;
	}

    $products[$name] = array();
    $products[$name]['price'] = $price;
    $products[$name]['quantity'] = $quantity;
    $products[$name]['image'] = $image;
    $products[$name]['visible'] = $visible;
    if (!data_to_file($products, __DIR__ . PRODUCT))
        return false;
    return true;
}

/*
 * @author ctrouill
 * @docs remove products
 * @params product_id id to remove
 * @return boolean of computation success
 */
function remove_product($name) {
    if (!$product_id)
        return false;
    if (($products = file_to_data(__DIR__ . PRODUCT)) === FALSE)
        return false;
    unset($products[$name]);
    if (data_to_file($data, __DIR__ . PRODUCT) === FALSE)
        return false;
    return true;
}

function add_product_to_category($category_name, $product_name) {
    if (!$category_name || !$product_name)
        return FALSE;
    if (($data = file_to_data(__DIR__ . CATEGORY)) === FALSE || !isset($data[$category_name]))
        return FALSE;
    array_push($data[$category_name], $product_name);
    if (data_to_file($data, __DIR__ . CATEGORY) === FALSE)
        return FALSE;
    return TRUE;
}

function add_category($name, $image, $visible) {
    if (!$name)
        return FALSE;
    if (($data = file_to_data(__DIR__ . CATEGORY)) === FALSE)
        return FALSE;
    if (isset($data[$name]))
        return FALSE;
    $data[$name] = array();
    $data[$name]['image'] = $image;
    $data[$name]['visible'] = $visible;
    if (data_to_file($data, __DIR__ . CATEGORY) === FALSE)
        return FALSE;
    return TRUE;
}

function remove_category($name) {
    if (!$name)
        return FALSE;
    if (($products = file_to_data(__DIR__ . CATEGORY)) === FALSE)
        return FALSE;
    unset($data[$name]);
    if (data_to_file($data, __DIR__ . CATEGORY) === FALSE)
        return FALSE;
    return TRUE;
}

?>
