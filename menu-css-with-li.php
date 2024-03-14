<!DOCTYPE html>
<html>
	<head> 
		<title>JBU Online Store</title>
		<link rel="stylesheet" href="css/styles.css">
		<script src="https://kit.fontawesome.com/bfea39c817.js" crossorigin="anonymous"></script> <!-- So I can use the cart icon-->
		<script>
			function popupfunction(x)
			{
				document.getElementById('popup'+x).style.display='block';
				document.getElementById('fade'+x).style.display='block';
			}
			function popupclose(x)
			{
				document.getElementById('popup'+x).style.display='none';
				document.getElementById('fade'+x).style.display='none';
			}	
			function addToCart(itemNameString) {
				document.getElementById('cart-section').innerHTML += itemNameString + "<br>"; 	
			}
			function showcart() {
				document.getElementById('cart-section').style.display='block';	
			}
		</script>
	</head>
	<body bgcolor="#ffffff">
		<br><br><br>
	<img src="img/jbu.png" alt="JBU Logo" style="display: block; margin: 0 auto; width: 200px; height: 200px;">
	<h1 align="center">🦅 Eaglenet Store</h1>
	<div class="cart" id="cart-section"></div>
	<ul>
		<div id="DropDowns">
		<li class="menu-item"><a href="#" class="drp">Apparrel</a>
			<div class="menu-content">
				<a  href="shirts.html">Tees</a><br>
				<a  href="hats.html">Hats</a><br>
				<a  href="crewnecks.html">Crewnecks</a><br>
				<a href="accessories.html">Accessories</a><br>
			</div>
		
		</li>
		<li class="menu-item"><a href="#" class="drp">Books </a>
		<div class="menu-content">
			<a  href="new_books.html">New Releases</a><br>
			<a  href="best_sellers.html">Best Sellers</a><br>
			<a href="genres.html">Genres</a><br>
		</div>
		
		</li>
		
		<li class="menu-item"><a href="#" class="drp">About</a>	
		<div class="menu-content">
			<a href="about_us.html">About Us</a><br>
			<a href="our_mission.html">Our Mission</a><br>
		</div>
		</li>
		</div>
		<div align="right">
			<a class="cart-icon" align="right" href="javascript:void(0)" onclick="showcart()"><i class="fa-solid fa-cart-shopping fa-xl"></i><!-- Represents a cart icon --></a>
		</div>
	</ul>
	<table align="center" class="merch-table">
		<tr>
		<?php include "connect_to_db.php";?>
		<?php
		$sql_product = "SELECT * FROM product_tab ORDER BY product_name ASC";
		$result_product = $connect->query($sql_product);

		$count = 0; // Counter variable to keep track of the number of products

		while ($row_product = $result_product->fetch_assoc()) {
			if ($count % 3 == 0 && $count != 0) {
				echo '</tr><tr>'; // Close the previous row and start a new row
			}
			?>
			<td align="center">
				<a href="javascript:void(0)" onclick="popupfunction(<?php echo $row_product['sid'];?>)" class="linktext">
				<img src="<?php echo $row_product['product_image'];?>" width="400px"><br><?php echo $row_product['product_name'];?></a>
				<br> <br> <button onclick="addToCart('<?php echo $row_product['product_name'];?>')">Add to Cart</button>
			</td>
			<div id="popup<?php echo $row_product['sid'];?>" class="white_content">
				<p align="center">
					<br><br><img src="<?php echo $row_product['product_image'];?>" width=30%><br><?php echo $row_product['product_name'];?><br><br>Price: $<?php echo $row_product['unit_price']; ?><br>Rating: <?php echo $row_product['Rating']; ?><br>
					<a href="javascript:void(0)" onclick="popupclose('<?php echo $row_product['sid']; ?>')" class="linktext">Back</a>
				</p>
			</div>
			<div id="fade<?php echo $row_product['sid']; ?>" class="black_content"></div>
			<?php
			$count++;
		}
		?>
		</tr>
	</table>
		<p align="center">A JBU Online Store<p>
	</body>
</html>