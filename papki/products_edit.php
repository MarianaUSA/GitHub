<?php
require_once('include/bootstrap.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//да се провери дали не може двете заявки да се обединят в 1

	

	db_update('products', array(
		'title' => $_POST['title'],
		'price' => $_POST['price'],
		'short_description' => $_POST['short_description']
	),$_GET['id']);

	redirect('products.php');
}

$data = products_get($_GET['id']);

require_once('include/header.php');

?>
<div class="content">

	<h2> Редактирай продукт: <em><?php echo $data['title']?></em> </h2>
	<form action="" method="post" enctype="multipart/form-data">
		<label>
			Име
			<input type="text" name="title" value="<?php echo $data['title']?>">
		</label>
		<br>
		<label>
			Цена
			<input type="text" name="price" value="<?php echo $data['price']?>">
		</label>
		<br>
		<label>
			Кратко описание
			<textarea name="short_description"><?php echo $data['short_description']?></textarea>
		</label>
		<br>
		<button type="submit">Запази</button>
		<button type="reset">Изчисти</button>
	</form>
</div>

<?php
require_once('include/footer.php');