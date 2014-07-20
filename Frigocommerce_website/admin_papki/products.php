<?php
require_once('include/bootstrap.php');
$results = products_get_all_count();

if (isset($_GET['action'])) {

	// да се напише с switch/case

	if ($_GET['action'] == 'delete') {
		//да се добави потвърждение за изтриване на файлове при изтриване
		
		db_delete('products', $_GET['id']);

		redirect('products.php?action=success');
	}

	if ($_GET['action'] == 'success') {
		echo 'Изтриването успешно';
	}
}



require_once('include/header.php');
?>
<div class="content">
	<table>
		<tr>
			<th width="50%">Име на продукта</th>
			<th width="20%">Цена</th>
			
			<th width="10%">Снимки</th>
			<th>Действие</th>
		</tr>
		<?php
		foreach ($results as $key => $value) {
		?>
		<tr>
			<td><?=$value['title']?></td>
			<td><?=$value['price']?></td>
						
			<td><a href="products_images.php?id=<?=$value['id']?>"><?=$value['cnt']?></a></td>
			
			<td><a href="products_edit.php?id=<?=$value['id']?>">Редактирай</a>
			 / <a href="products.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
		</tr>
		<?php
		}
		?>
	</table>
	<br>
	<a href="products_add.php">Добави нов продукт!</a>
</div>
<?php
require_once('include/footer.php');