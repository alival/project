<?php 
	require_once('include/bootstrap.php');
	$products = new Products($db_connection);
	$news = new News($db_connection);
	$latestNews = $news->getLatestNewsLimited();
	$items = $products->getLatestProductsLimited();

	require_once('include/header.php');
?>
<section id="articleTitle">
	<article>
		<p>
			Hello we are working in Sunny Beach come, visit our family business and see our job. We put a life in your T-Shirt and we are trying our best to create passion and charisma in your clothes, come and visit us! 
		</p>
	</article>
</section>
<section>
	<?php  foreach($items as $value) : ?>
	<div class="products">
		<a href="products.php?id=<?=$value['id']?>">
			<img src="images/products/<?=$value['main_image']?>" alt="t-shirt" width="342px" height="342px">
		</a>
		<div class="hr"></div>
		<div class="productsText">
			<h3><a href="products.php?id=<?=$value['id']?>"><?=$value['title']?></a></h3>
			<p><?=$value['price']?>$</p>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="spacer"></div>
</section>
<section class="latestNews">
	<article>
		<h1 style="text-align: center;font-size: 40px;color:rgb(231, 231, 240);">Latest News</h1>
		<?php foreach($latestNews as $value) : ?>
		<div style="border: 1px solid rgb(231, 231, 240);margin: 20px auto;">
			<p style="font-size: 30px;color: indianred;"><?= $value['title']?></p>
			<p>
				<?=substr($value['content'], 0, strlen($value['content'])/2 )?>...
				<a href="news.php?id=<?=$value['id']?>">(Read More)</a>
			</p>
		</div>
	<?php endforeach; ?>
	</article>
</section>
<?php require_once('include/footer.php'); ?>
