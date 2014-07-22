<?php

require_once('include/bootstrap.php');

$comments = new Comments($db_connection);
$news = new News($db_connection);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim(addslashes(strip_tags($_POST['comName'])));
    $content = trim(addslashes(strip_tags($_POST['comText'])));
    
    $addComment = new DBComment();
    $addComment->name = $name;
    $addComment->content = $content;
    $addComment->date_added = date('Y-m-d H:i:s');
    $addComment->news_id = $_GET['id'];
    $comments->add($addComment);
}

if (isset($_GET['id'])) {
	$param = $_GET['id'];
} else {
	$param = 1;
}
$result = $news->get($param);
$commentsData = $news->getComments($param);

require_once('include/header.php');
?>
	<section id="news">
		<h1 class="commentsTitle"><?= $result['title']?></h1>
		<p class="postedBy">Posted on <?= $result['date_added']?> by <?= $result['title']?></p>
		<img src="images/news/<?=$result['image'] ?>" alt="many t-shirts">
		<p class="post">
			<?= $result['content']?>
		</p>
	</section>
	<section id="comments">
		<?php foreach ($commentsData as $key => $value) : ?>
		<h1 class="commentsTitle">Comments</h1>
		<p class="postedBy">Posted on <?=$value['date_added']?> by <?=$value['name']?></p>
		<p class="post">
			<?=$value['content']?>
		</p>
		<?php endforeach; ?>
		<form action="?id=<?=$result['id'] ?>" method="post" id="commentForm">	
		<h2>Comment Yourself</h2>
			<p class="commentName">
				<label for="comName">Name</label>
				<input type="text" name="comName" id="comName" placeholder="Enter your name here..." />
			</p>
			<p class="commentText">
				<label for="comText">Contact Us</label>
				<textarea name="comText" placeholder="Write something to us" id="comText"/></textarea>
			</p>	
			<p>
				<button type="submit" id="myButton">Comment</button>
			</p>
		</form>	
	</section>
<?php require_once('include/footer.php'); ?>
