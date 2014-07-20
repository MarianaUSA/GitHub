<?php
require_once('include/bootstrap.php');

$data = pages_get($_GET['id']);

// $pages = new Pages($db_connection);
// $data = $pages->get($_GET['id']);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//да се провери дали не може двете заявки да се обединят в 1
	
	// $page = new Page();
	// $page->title = $_POST['title'];
	// $page->content = $_POST['content'];
	// $pages->update($_GET['id'], $page);
	$data = array(
		'title' => $_POST['title'],
		'content' => $_POST['content']
	);
	db_update('pages', $data,$_GET['id']);

	redirect('pages.php');
}



require_once('include/header.php');

?>
<div class="content">

	<h2> Редактирай страница: <em><?php echo $data['title']?></em> </h2>
	<form action="" method="post" enctype="multipart/form-data">
		<label>
			Заглавие
			<input type="text" name="title" value="<?php echo $data['title']?>"/>
		</label>
		<br>
		<label>
			Съдържание
			<textarea name="content"><?php echo $data['content']?></textarea>
		</label>
		<br>
		
		<br>
		<button type="submit">Запази</button>
		<button type="reset">Изчисти</button>
	</form>
</div>

<?php
require_once('include/footer.php');