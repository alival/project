`<?php 
	require_once('include/bootstrap.php');

	$products = new Products($db_connection);
	$allProducts = $products->getAll();
	$pagination = new Pagination($allProducts, 3);
	$catalogProducts = $pagination->pieces();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($_POST['search'] != '') {
			$sql = 'SELECT * FROM products WHERE title LIKE \'%' . $_POST['search'] . '%\' LIMIT 2';// OR price LIKE \'%' . $_POST['search'] . '%\'';
			$searchArray = db_select($sql);
			$catalogProducts = $searchArray;
			$pagination = new Pagination($catalogProducts, 3);
		} else {
			redirect('catalog.php');
		}
	}
	require_once('include/header.php');
?>
<section>
	<div id="searchBox">
		<form action="catalog.php?search=true" method="post">
			<input id="search" type="text" name="search" placeholder="Type here">
			<button id="submit" type="submit" style="float: right;">Search</button>
		</form>
	</div>
</section>
<section>
		<?php foreach ($catalogProducts as $key => $value) : ?>
	<div class="catalogProducts">
			<a href="products.php?id=<?=$value['id']?>">
				<img src="images/products/<?=$value['main_image']?>" alt="catalog products" width="200px" height="200px" id="prdImg">
			</a>
			<h1 class="catalogTitle">
				<a href="products.php?id=<?=$value['id']?>"><?=$value['title']?></a>
			</h1>
			<h1 class="catalogPrice"><?=$value['price']?>$</h1>
			<div class="catalogText">
			<p>
			<?=$value['content']?>
			</p>
			</div>
	</div>
		<?php endforeach; ?>
		<?php if (!isset($_GET['search']) && $_GET['search'] !== 'true') : ?>
   <div class="pagination">
		<?=$pagination->pages()?>
	</div>
			<?php else : ?>
			<a href="catalog.php" style="color: white;">(See More...)</a>
			<?php endif; ?>
</section>
</div>
<?php require_once('include/footer.php'); ?>

