<?php 
	$header_title='Blog:';
	require_once('includes/header.php');
?>
<?php 
require_once('../papki/include/bootstrap.php');

$sql = 'SELECT id, title, content, image, date_added FROM news GROUP BY id';
$data = db_select($sql);
?>
<html>
<head>
	<title>blog_frigo</title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>
	<section id="content">
		<article>
			 <?php foreach($data as $key => $value) {?>
				<br>
				<div class="comment">
					<fieldset>
						<h2><a href="news_frigo.php?id=<?=$value['id']?>"><?=$value['title'];?></a></h2>
						<p><em><?=$value['date_added'];?></em></p>
						<p><?=$value['content'];?></p>
					</fieldset>
					<br>
				</div>
			<?php }; ?>
		</article>
	</section>
	</fieldset id="bodycolor">
<?php require_once('includes/footer.php'); ?>
</body>
</html>













