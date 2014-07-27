<?php 	
	require_once('include/bootstrap.php');
	
	$products = new Products($db_connection);
	$product = $products->get($_GET['product_id']);


	if (!empty($_POST)) {

		if ( $_POST['name'] != '' && 
			$_POST['email'] != '' && 
			$_POST['phone'] != '') { 
			
			$purchases = new Purchases($db_connection);
			$addPurchase = new DBPurchases($db_connection);
			$addPurchase->name = $_POST['name'];
			$addPurchase->date_added = date('Y-m-d H:i:s');
			$addPurchase->email = $_POST['email'];
			$addPurchase->phone = $_POST['phone'];
			$addPurchase->product_title = $product['title'];
			$addPurchase->product_price = $product['price'];
			$addPurchase->product_id = $_GET['product_id'];
			$purchases->add($addPurchase);


		}
	}


	require_once('include/header.php');
?>
<?php

	if (isset($_GET['is_purchased']) && $_GET['is_purchased'] == true) {
		echo '<h1>Вие успешно поръчахте - ' . $product['title'] . '</h1>';
		echo '<p>За потвърждение изпратете сумата от  - <span style="color: indianred">' . $product['price'] . '$</span> на <strong><span style="color: white"><u>IBAN: BC12010120120</u></span></strong>
				с референция <span style="color: indianred">[ID] = ' . $_GET['product_id'] . '</span>
			</p>';
		echo '<a href="index.php" style="color:white;">(Go to Home Page)</a>';
			exit;
	}

?>
		<style>
			#purchase {
				position: relative;
				left: 150px;
			}
			#item {
				margin: 20px auto;
			}
		</style>
		<h1>Купуване на - <span style="color: #f3f3f3;"><?=$product['title']?></span></h1>	
		<h1>Цена на продукта - <span style="color: red;"><?=$product['price']?>$</span></h1>
		<br><br>
		<form action="purchases.php?product_id=<?=$product['id']?>&is_purchased=true" id="contactForm" method="post">
		<div id="successResult"></div>
			<div id="purchase">
				<p class="name" id="item">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" placeholder="Enter your name here..." />
				</p>	
				<p class="email" id="item">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" placeholder="Enter your email here..." />
				</p>	
				<p class="phone" id="item">
					<label for="phone">Phone</label>
					<input type="text" name="phone" id="phone" placeholder="Enter your phone here..." />
				</p>		
				<p>
					<button type="submit" id="myButton">Buy</button>
				</p>
			</div>
		</form>
	</section>
<?php require_once('include/footer.php'); ?>
