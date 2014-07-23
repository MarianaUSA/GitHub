<?php 
	$header_title='Order:';
	require_once('includes/header.php');
?>
<?php 

require_once('../papki/include/bootstrap.php');

$one_product = products_get($_GET['id']);


?>
<?php 
require_once('../papki/include/bootstrap.php');
$sql = 'SELECT id, product_title, product_price FROM orders ORDER BY id DESC LIMIT 1;';
$data = db_select($sql);
?>

<html>
<head>
	<title>order_frigo</title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>
	
		
		
		<section id="content">
			<article>		
			
						
		 <h2 class="heading">Order Form:</h2>
			<fieldset class="contact_us">
<?php

$success = false;
$errors = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['name'] !== '' && $_POST['email'] !== '' && $_POST['phone'] !== '') {
    
	$date_added = date('Y-m-d H:i:s');
	$name = $_POST['name'];
    $email = $_POST['email'];
	$phone = $_POST['phone'];
	$product_title = $one_product['title'];
	$product_price = $one_product['price'];
	$id = db_insert('orders', array(
					'date_added' => $date_added,
					'name' => $name,
					'email' => $email,
					'phone' => $phone,
					'product_title' => $product_title,
                    'product_price' => $product_price
                    
                ));
	header('Location: accepted_order_frigo.php?id='.$id);
            $success = true;
} else {
        $errors = true;
}

?>
  


				<div class="column">
<?php if($success == true): ?>

<!--<a href="accepted_order_frigo.php?id=<?//=$data['id'];?>"></a>-->

<?php endif; ?>

<?php if($errors == true): ?>
<div class="error">Please, fill in the form correctly!</div>
<?php endif; ?>

       
					<form action="" method="post">
						<br>
						<div>
							<label for="name">Name:<input name="name" id="name" value=""> 
							</label>
						</div>
						<br>
						<div>
							<label for="email">E-mail:<input type="text" name="email" id="email">
							</label>
						</div>
						<br>
						<div>
							<label for="phone">Telephone:<input type="text" name="phone" id="phone">
							</label>
						</div>
						<br>
						
						<div>
							<?php foreach ($data as $key => $value):?>
								<a href="accepted_order_frigo.php?id=<?=$value['id'];?>"><button type="submit">Order</button></a>
							<?php endforeach; ?>
						</div>
					</form>
				</fieldset>
				</div>
						
		</article>		
	</section>
	</fieldset>
	
</body>

</html>
<?php require_once('includes/footer.php'); ?>