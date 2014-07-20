<?php
	$header_title='News:';		
	require_once('includes/header.php');
?>

<?php 

require_once('../papki/include/bootstrap.php');
$news_one=news_get($_GET['id']); 

$comments = news_comments_get_all($_GET['id']); // get all comments for a news 

/*$sql = 'SELECT id, name, content, date_added FROM comments GROUP BY news_id';
$data = db_select($sql);*/


/*sql = 'SELECT id, title, content, image, date_added FROM news;';
$data = db_select($sql);*/
?>
<html>
<head>
	<title>news_frigo</title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>		
	<section id="content">
		<article>
			<div class="comment">
				<fieldset>
					
						
					<h2><a href="blog_frigo.php?id=<?=$news_one['id'];?>"><?=$news_one['title'];?></a></h2>	
					<h3><em>Posted on: <?=$news_one['date_added'];?></em></h3>
					<br><img src="../papki/storage/<?=$news_one['image']?>" class="design1_img">
					<br>
					<br>
					<br>
					<p class="comment">
						<?=$news_one['content'];?>						
					</p>
					<br>
					<br>				
					<br>					
					<fieldset><legend>Comments:</legend>
	<div>

<?php foreach ($comments as $key => $value):?>
	<p class="important"><em><?=$value['name']?> said on <?=$value['date_added'];?></em></p>
	<p><?=$value['content'];?></p>
	<br>
	<?php endforeach; ?>
	</div>
						
					</fieldset>				
					<br>
					<fieldset><legend>Comment Yourself:</legend>
						<div>
						
<?php

$success = false;
$errors = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['name'] !== '' && $_POST['content'] !== '') {
    $name = $_POST['name'];
    $content = $_POST['content'];
    $date_added = date('Y-m-d H:i:s');
	$news_id = $_GET['id'];
	db_insert('comments', array(
					'name' => $name,
					'content' => $content,
                    'date_added' => $date_added,
					'news_id' => $news_id
                ));

            $success = true;
} else {
        $errors = true;
}

?>
<?php if($success == true): ?>
<div class="success">Thank you for your comment!</div>
<?php endif; ?>

<?php if($errors == true): ?>
<div class="error">Please, fill in the form correctly!</div>
<?php endif; ?>

  
						<form action="" method="post">
							<div>
								<label for="name">Name:<input name="name" id="name" value=""> 
								</label>
							</div>
							<br>
							<div>
								<label for="content">Comment:<textarea name="content" id="content"></textarea>
								</label>
							</div>
							<br>
							<div>
								<button type="submit">Submit Comment</button>
							</div>
						</form>
						</div>
					</fieldset>
					<br>
			</div>
		
		
		</article>
	</section>
		
	</fieldset>
<?php require_once('includes/footer.php'); ?>	
</body>
</html>