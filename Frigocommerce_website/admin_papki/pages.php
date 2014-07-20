<?php
require_once('include/bootstrap.php');

$sql='SELECT * FROM pages';
$result=db_select($sql);

//$pages = new Pages($db_connection);
//$result = $pages->getАll();
if (isset($_GET['action'])) {

	// да се напише със switch/case
	switch ($_GET['action']) {
		case 'delete':
			//$pages->delete($_GET['id']);
			db_delete('pages', $_GET['id']);
			redirect('pages.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
			break;
		default:
			redirect('pages.php');
			break;
	}

	//if ($_GET['action'] == 'delete') {
		//да се добави изтриване на файлове при изтриване

		//db_delete('pages', $_GET['id']);

		//redirect('pages.php?action=success');
	//}
	//if ($_GET['action'] == 'success') {
		//echo 'Изтриването e успешно';
	//}
}



require_once('include/header.php');
?>
<div class="content">
	<table>
		<tr>
			<th width="50%">Заглавие на страницата</th>
			<th width="20%">Съдържание</th>
			<th>Действие</th>
		</tr>
		<?php
		foreach ($result as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['title']?></td>
			<td><?php echo $value['content']?></td>
			<td><a href="pages_edit.php?id=<?=$value['id']?>">Редактирай</a> / <a href="pages.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
		</tr>
		<?php
		}
		?>
	</table>
	<br>
	<a href="pages_add.php">Добави Нова Страница!</a>
</div>
<?php
require_once('include/footer.php');