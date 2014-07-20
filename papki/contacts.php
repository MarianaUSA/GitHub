<?php
require_once('include/bootstrap.php');

$sql='SELECT * FROM contacts';
$result=db_select($sql);

if (isset($_GET['action'])) {
	
	switch ($_GET['action']) {
		case 'delete':
			db_delete('contacts', $_GET['id']);
			redirect('contacts.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
			break;
		default:
			redirect('contacts.php');
			break;
	}

}

require_once('include/header.php');
?>
<div class="content">
	<table>
		<tr>
			<th width="20%">Име</th>
			<th width="20%">Емайл</th>
			<th width="20%">Телефон</th>
			<th width="20%">Относно</th>
			<th width="20%">Съдържание</th>
			<th>Действие</th>
		</tr>
		<?php
		foreach ($result as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['name']?></td>
			<td><?php echo $value['email']?></td>
			<td><?php echo $value['phone']?></td>
			<td><?php echo $value['subject']?></td>
			<td><?php echo $value['content']?></td>
			<td><a href="contacts.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
		</tr>
		<?php
		}
		?>
	</table>
	<br>
	
</div>
<?php
require_once('include/footer.php');