<?php
session_start();
require_once("connect.php");
//$db_handle = new DBController();

 ?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = mysql_query("SELECT * FROM productDetails");
	while($row = mysql_fetch_assoc($product_array)){
		$resultnew[] = $row;
	}
	if (!empty($resultnew)) {
		foreach($resultnew as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $resultnew[$key]["uuid"]; ?>">
			<div class="product-image"><img src="<?php echo $resultnew[$key]["image"]; ?>"></div>
			<div><strong><?php echo $resultnew[$key]["brand"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$resultnew[$key]["price"]; ?></div>
			<input type="submit" value="Add to cart" class="btnAddAction" name="btn">
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
</body>
</html>
