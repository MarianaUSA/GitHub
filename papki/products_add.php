<?php
require_once('include/bootstrap.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['title'] != '' && $_POST['price'] != '' && $_POST['short_description'] != '') {

		db_insert('products', array(
			'title' => $_POST['title'],
			'price' => $_POST['price'],
			'short_description' => $_POST['short_description']
		));

	}

	redirect('products.php');
}
$data=products_get($_GET['id']);
require_once('include/header.php');

?>
<div class="content">

	<h2> Добави продукт</h2>
	<form action="" method="post" enctype="multipart/form-data">
		<label>
			Име
			<input type="text" name="title">
		</label>
		<br>
		<label>
			Цена
			<input type="text" name="price"> 
		</label>
		<br>
		<label>
			Кратко описание
			<textarea name="short_description"></textarea>
		</label>
		<br>
		<button type="submit">Запази</button>
		<button type="reset">Изчисти</button>
	</form>
</div>

<?php
require_once('include/footer.php');
?>