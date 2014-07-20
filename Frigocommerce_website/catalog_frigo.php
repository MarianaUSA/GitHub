<?php 
	$header_title='Catalog:';
	require_once('includes/header.php');
?>
<?php 
require_once('../papki/include/bootstrap.php');
$sql = '
	SELECT a.id, a.title, a.price, a.short_description, b.title as image
	FROM products a
	LEFT JOIN products_images b ON a.id = b.products_id
	GROUP BY a.id
	';
$data = db_select($sql);

?>
<html>
<head>
	<title>catalog_frigo</title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>
				
		<section id="content">
		<article>
		<fieldset>


<?php 

$success = false;
$errors = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['catalog'] !== '' && $_POST['order_by'] == 'price') {
    $title=$_POST['catalog'];
	foreach($data as $key => $value) {
		if ($title == $value['title']) {
	$sql = '
	SELECT a.id, a.title, a.price, a.short_description, b.title as image
	FROM products a
	LEFT JOIN products_images b ON a.id = b.products_id
	GROUP BY a.id 
	ORDER BY a.price ASC
	WHERE a.title = '.$title;
	
	$data = db_select($sql); 
	
	$success = true;
}
}
} else {
    $errors = true;
}

?>
<?php if($success == true): ?>
<div class="success">

<a href="catalog_search_results.php?id=<?=$value['id']?>">Click here to see the results of your search</a>

</div>
<?php endif; ?>

<?php if($errors == true): ?>
<div class="error">There is no such product in our catalogue. Please, try with a different product name!</div>
<?php endif; ?>
			
			<div class="column">
				<br>
				<label for="search">Search:<input type="text" name="catalog" id="catalog" value=""></label>
				<button type="search">Search</button>
			</div>
			
			<div class="column">
				<br>
				<label for="order by">Order By:
					<select name="order_by" size="1">
						<option>price</option>
						<option>option2</option>
						<option>option3</option>
						<option>option4</option>
					</select>			
				</label> 		
			</div>
			
		</fieldset>
		<br>
		
		<fieldset id="catalog_search">

		<?php foreach($data as $key => $value) {
			//$products_id=$value['id'];
			?>
		<br>
		<fieldset>
		<br>
		<div class="column">
		<br>	
				
				<a href="details_frigo.php?id=<?=$value['id']?>"><img src="../papki/products_images/<?=$value['image'];?>" class="frigo_part_img"></a>
						
			</div>			
			<div class="column">
				<br>
				<span class="rowspace"><?=$value['title'];?></span>
				<span class="rowspace"><?=$value['price'];?></span>
				<br>
			</div>
			<p class="comment"><?=$value['short_description'];?></p>
		<br>	
		</fieldset>
		
		<?php }; ?>
		
		</article>
	</section>
	</fieldset>
	<?php require_once('includes/footer.php'); ?>
</body>

</html>
