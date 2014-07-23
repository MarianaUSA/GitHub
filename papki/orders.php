<?php
require_once('include/bootstrap.php');

$sql='SELECT * FROM orders';
$result=db_select($sql);

if (isset($_GET['action'])) {
	
	switch ($_GET['action']) {
		case 'delete':
			db_delete('orders', $_GET['id']);
			redirect('orders.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
			break;
		default:
			redirect('orders.php');
			break;
	}

}

require_once('include/header.php');
?>
<div class="content">
	<table>
		<tr>
			<th width="10%">ID</th>
			<th width="15%">Дата</th>
			<th width="15%">Име</th>
			<th width="15%">Емайл</th>
			<th width="15%">Телефон</th>
			<th width="15%">Продукт</th>
			<th width="15%">Цена</th>
			<th>Действие</th>
		</tr>
		<?php
		foreach ($result as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['id']?></td>
			<td><?php echo $value['date_added']?></td>
			<td><?php echo $value['name']?></td>
			<td><?php echo $value['email']?></td>
			<td><?php echo $value['phone']?></td>
			<td><?php echo $value['product_title']?></td>
			<td><?php echo $value['product_price']?></td>
			<td><a href="orders_approved.php?id=<?php echo $value['id']?>">Одобри</a> / <a href="orders.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
		</tr>
		<?php
		}
		?>
	</table>
	<br>
	
</div>
<?php
require_once('include/footer.php');