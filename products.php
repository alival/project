<?php
	require_once('include/bootstrap.php');

	$products = new Products($db_connection);
	$productImages = new ProductsImages($db_connection);
	$product = $products->get($_GET['id']);
	$gallery = $productImages->getAllforProduct($product['id']);


	require_once('include/header.php');
?>
			<div class="productsCatalog">
				<img src="images/products/<?=$product['main_image']?>" alt="t-shirt" width="342" height="342">
			</div>
			<h1 class="buyProductTitle"><?=$product['title']?></h1>
			<h1 class="buyProductTitle Price"><?=$product['price']?>$</h1>
			<button type="button" class="buyProductTitle Button" style="cursor: pointer">Buy Now</button>
			<section id="aboutUs" class="buyProduct">
				<article>
					<p>
						<?=$product['content']?>
					</p>
				</article>
			</section>
			<section id="buyProductGallery">
				<a href="#">
					<img src="images/gallery.png" id="gallery" src="gallery"/>
				</a>
				<div class="ourProducts">
					<?php foreach($gallery as $item) : ?>
						<img src="images/products/<?=$item['image_name']?>" alt="t-shirt" width="200px" height="200px">
					<?php endforeach; ?>
				</div>
			</section>
<?php require_once('include/footer.php'); ?>

