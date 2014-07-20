<?php
require_once('include/bootstrap.php');

// $pages = new Pages($db_connection);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['title'] != '' && $_POST['content'] != '') {

		/*$page = new Page();
		*$page->title = $_POST['title'];
		*$page->content = $_POST['content'];
		*$pages->add($page);*/

		db_insert('pages', array(
			'title' => $_POST['title'],
			'content' => $_POST['content']
			
		));

	}

	redirect('pages.php');
}

require_once('include/header.php');

?>
<div class="content">

	<h2> Добави страница </h2>
	<form action="" method="post" enctype="multipart/form-data">
		<label>
			Заглавие
			<input type="text" name="title">
		</label>
		<br>
		<label>
			Съдържание
			<textarea name="content"></textarea>
		</label>
		<br>
		
		</label>
		<br>
		<button type="submit">Запази</button>
		<button type="reset">Изчисти</button>
	</form>
</div>

<?php
require_once('include/footer.php');