<?php 
	$header_title='Products\' Details:';
	require_once('includes/header.php');
?>
<?php 

require_once('../papki/include/bootstrap.php');
/*global $db_connection;
$sql = '
	SELECT id, title, price, short_description
	FROM products
	WHERE id = '.$_GET['id'];
	$one_product=db_select($sql);*/ 

$one_product = products_get($_GET['id']);

$one_product_images = products_images_get_all($_GET['id']); // get all products_images for a product 



?>


<html>
<head>
	<title>details_frigo</title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>
	
			
		<section id="content">
		<article>
		
			<div class="column">
				<a href="catalog_frigo.php?id=<?=$one_product['id'];?>">
				<?php foreach ($one_product_images as $key => $value) {?>
					<img src="../papki/products_images/<?=$value['title']?>" class="frigo_part_img">
				<?php } ?>
				</a>
			</div>
			<div class="column">
				<h2 class="important"><?=$one_product['title']?></h2>
				<br>
				<p class="important"><?=$one_product['price']?></p>
				<br>
				<br>
				<a href="order_frigo.php?id=<?=$one_product['id']?>"><button type="search">Buy Now</button></a>
			</div>
			<p class="comment"><?=$one_product['short_description']?></p>
			<br>
		
			<div id="newtext">
				<h2>Galery</h2>
					<div>
						<span id="rowspan"><a href="catalog_frigo.php"><img src="pic2.jpg" class="frigo_part_img"></a></span>
						<span id="rowspan"><a href="catalog_frigo.php"><img src="pic3.jpg" class="frigo_part_img"></a></span>
						<span id="rowspan"><a href="catalog_frigo.php"><img src="pic4.jpg" class="frigo_part_img"></a></span>
					</div>
			</div>
			
		</article>
	</section>
	</fieldset>
	<?php require_once('includes/footer.php'); ?>
</body>

</html>
