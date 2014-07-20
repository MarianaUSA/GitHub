<?php 
	$header_title='Home:';
	require_once('includes/header.php');
?>
<?php 
require_once('../papki/include/bootstrap.php');
$sql = 'SELECT id, title, content FROM news ORDER BY date_added DESC LIMIT 3;';
$data = db_select($sql);
?>

<html>
<head>
	<title>home_frigo</title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>
	<section id="content">
		<article>
			<h2>BIG Promotion!!!</h2>
			<p>Frigocommerce International Ltd. offers excellent prices because we are a direct importer of goods from multiple manufacturers, which allows us to offer an optimal combination of price and quality, instead of being forced to work with only the products of one-two manufacturers. The quality of our refrigeration equipment is superior and is guaranteed by both the world-renowned manufacturers with which we work and our own 20-year practical experience in the field of refrigeration technology in Bulgaria.</p>
			<br>			
			<div class="column">
				<fieldset class="frame"><a href="catalog_frigo.php"><img src="pic1.jpg" class="frigo_part_img"></a>
					<br><figurecaption>Compressor<br>130$</figurecaption>
				</fieldset>
				<br>
				<fieldset class="frame"><a href="catalog_frigo.php"><img src="pic2.jpg" class="frigo_part_img"></a>
					<br><figurecaption>Fan<br>15$</figurecaption>
				</fieldset>
			</div>			
			<div class="column">
				<fieldset class="frame"><a href="catalog_frigo.php"><img src="pic3.jpg" class="frigo_part_img"></a>
					<br><figurecaption>Condensing Unit<br>450$</figurecaption>
				</fieldset>
				<br>
				<fieldset class="frame"><a href="catalog_frigo.php"><img src="pic4.jpg" class="frigo_part_img"></a>
					<br><figurecaption>Freon R134a<br>40$</figurecaption>
				</fieldset>
			</div>			
			<div id="newtext">
				<br>
				<h3>Latest News:</h3>
				<?php foreach ($data as $key => $value):?>
				<p><strong><em><?=$value['title']?> </em></strong><?=$value['content']?> <a href="news_frigo.php?id=<?=$value['id']?>"> Read More</a></p>
				<?php endforeach; ?>
				
				
			</div>			
			</article>
		</section>	
	</fieldset>
	


</body>

</html>
<?php require_once('includes/footer.php'); ?>