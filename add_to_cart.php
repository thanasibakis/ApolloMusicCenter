<?php
	include_once "include/setup.php";
	
	if(isset($_POST["id"]))
	{
		$id = htmlentities($_POST["id"]);
		$item = new Item($id);
		$index = get_index_of_item_in_cart($item);
		
			
		if($index == -1)
		{
			$_SESSION["cart"][] = $item;
			$item->update_quantity_in_cart(1);
		} else
		{
			$item = $_SESSION["cart"][$index];
			if($item->get_quantity_in_cart() < $item->get_quantity_available())
			{
				$item->update_quantity_in_cart(1);
			}
		}
		
	}
	header("Location: cart.php");
	exit();
?>