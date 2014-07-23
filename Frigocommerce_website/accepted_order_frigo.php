<?php 
	$header_title = 'Accepted Order:';
	require_once('includes/header.php');
?>
<?php 

//require_once('../papki/include/bootstrap.php');
//$one_product = products_get($_GET['id']);

?>
<?php 
require_once('../papki/include/bootstrap.php');
$sql = 'SELECT id, product_title, product_price FROM orders WHERE id='.$_GET['id'].';';
$data = db_select($sql);

?>

<html>
<head>
	<title>accepted_order</title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>
	
		<section  id="content">
			<article>
			<div>
			<?php foreach ($data as $key => $value):?>
			<p><strong>THANK YOU!</strong></p>
			
			<p>
				You have just ordered the product - <strong><?php echo $data[0]['product_title']?></strong>
			</p>
			<p>
			     For confirmation of your order, please send the amount of <strong><?php echo $data[0]['product_price']?></strong> by using the account IBANBG121416 with a reference number <strong><?php echo $data[0]['id']?></strong>.
			</p>
			<?php endforeach; ?>
			</div>
			</article>
		</section>
	</fieldset>
	<?php require_once('includes/footer.php'); ?>
</body>
</html>
