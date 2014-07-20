<?php 
require_once('../papki/include/bootstrap.php');
$sql = 'SELECT title FROM pages';
$data = db_select($sql);
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>
	
	<fieldset id="header">
	<header>
		<a href="home_frigo.php"><img src="logo.jpg" id="logo"></a>
		<h1><a href="home_frigo.php">Frigocommerce International Ltd.<p id="motto">*The better refrigeration*</p><p><?=$header_title?></p></a>
		</h1>
	</header>
	</fieldset>
		<fieldset id="bodycolor">
		<fieldset id="sidenavigation"><legend>Menu:</legend>
			<nav>
			<div>
			<br><div class="sidenavigationlink"><a href="home_frigo.php">Home</a></div>
			<br><div class="sidenavigationlink"><a href="about_frigo.php">About Us:</a></div>
			<br><div class="sidenavigationlink"><a href="contacts_frigo.php">Contacts:</a></div>
			<br><div class="sidenavigationlink"><a href="catalog_frigo.php">Catalog:</a></div>
			<br><div class="sidenavigationlink"><a href="blog_frigo.php">Blog:</a></div>
			<?php foreach($data as $key => $value): ?>
				<br><div class="sidenavigationlink"><a href=""><?=$value['title']?></a></div>
			<?php endforeach; ?>
			</div>
			</nav>
		</fieldset>
		
		
</body>
</html>
