<?php
	require_once('include/bootstrap.php');
	$news = new News($db_connection);
	$result = $news->getAll();
	$pagination = new Pagination($result, 3);
	require_once('include/header.php');
?>
<section class="comments">
	<?php foreach($pagination->pieces() as $key => $value) : ?>
		<h1 class="commentsTitle"><a href="news.php?id=<?=$value['id']?>"><?=$value['title']?></a></h1>
		<p class="postedBy">Posted on <?=$value['date_added']?> by <a href="news.php?id=<?=$value['id']?>"><?=$value['title']?></a></p>
		<p class="post">
			<?=$value['content']?>
		</p>
	<?php endforeach; ?>
<div class="pagination">
	<?=$pagination->pages()?>
</div>
</section>
<?php require_once('include/footer.php'); ?>

