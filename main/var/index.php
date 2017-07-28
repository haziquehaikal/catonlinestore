<?php
session_start();
require_once("connect.php");
//$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!isset($_GET["btn"])) {
			$productByCode = mysql_query("SELECT * FROM productDetails WHERE uuid='" . $_GET["code"] . "'");
			while($row = mysql_fetch_assoc($productByCode)){
				$resultnew[] = $row;
			}
			$itemArray = array(
				$resultnew[0]["uuid"]=>array(
					'brand'=>$resultnew[0]["brand"],
					'uuid'=>$resultnew[0]["uuid"],
					'price'=>$resultnew[0]["price"]));

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($resultnew[0]["uuid"],$_SESSION["cart_item"])) {
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
}
}
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>
<?php
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["brand"]; ?></strong></td>
				<td><?php echo $item["uuid"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td align=right><?php echo "$".$item["price"]; ?></td>
				<td><a href="index.php?action=remove&code=<?php echo $item["uuid"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>
  <?php
}
?>
</div>
</BODY>
</HTML>
