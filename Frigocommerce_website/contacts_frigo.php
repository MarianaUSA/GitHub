<?php 
	$header_title='Contacts:';
	require_once('includes/header.php');
?>
<html>
<head>
	<title>contacts_frigo</title>
	<link rel="stylesheet" href="styles_frigo.css">
</head>
<body>
	
		
		
		<section id="content">
			<article>		
			<h2 class="heading">Our Contact Details:</h2>
			<div class="our_contact_details">
				<fieldset>
					<div class="column">
					<h4>Main office:</h4>
						<p>Plovdiv, 79A Dunav Blvd.
						<br>tel/fax: 032/953-875
						<br>GSM: 0889/309-644, 0889/309-648
						<br>e-mail: office.plovdiv@frigocommerce.com
						</p>
					<h4>Warehouse Plovdiv:</h4>
						<p>Plovdiv, 79A Dunav Blvd.
						<br>tel: 032/960-974
						<br>tel/fax: 032/953-875
						<br>GSM: 0888/646-760
						<br>e-mail: office.plovdiv@frigocommerce.com
						</p>
					<h4>Warehouse Burgas:</h4>
						<p>Burgas, 15 Industrialna Str.
						<br>tel/fax: 056/810-546 
						<br>GSM: 0886/628-279 
						<br>e-mail: office.burgas@frigocommerce.com
						</p>
					</div>
					<div class="column">
					<br><br><br><br><br><br><br><br>
					<h4>Warehouse Sofia:</h4>
						<p>Sofia, 4 Pavlina Unufrieva Str., warehouse #10
						<br>tel/fax: 02/931-1507
						<br>GSM: 0889/309-653, 0888/924-343
						<br>e-mail: office.sofia@frigocommerce.com
						</p>
					<h4>Warehouse Varna:</h4>
						<p>Varna, 37 Mladejka Str.
						<br>tel/fax: 052/731-013
						<br>GSM: 0884/176-640 
						<br>e-mail: office.varna@frigocommerce.com
						</p>
					</div>
				</fieldset>
			</div>
		 <h2 class="heading">Contact Form:</h2>
			<fieldset class="contact_us">
<?php

$success = false;
$errors = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['name'] !== '' && $_POST['email'] !== '' && $_POST['phone'] !== ''
	&& $_POST['subject'] !== '' && $_POST['content'] !== '') {
    $name = $_POST['name'];
    $email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$content = $_POST['content'];
    
	db_insert('contacts', array(
					'name' => $name,
					'email' => $email,
					'phone' => $phone,
					'subject' => $subject,
                    'content' => $content
                    
                ));

            $success = true;
} else {
        $errors = true;
}

?>
  


				<div class="column">
<?php if($success == true): ?>
<div class="success">Thank you for contacting us!</div>
<?php endif; ?>

<?php if($errors == true): ?>
<div class="error">Please, fill in the form correctly!</div>
<?php endif; ?>

       
					<form action="" method="post">
						<br>
						<div>
							<label for="name">Name:<input name="name" id="name" value=""> 
							</label>
						</div>
						<br>
						<div>
							<label for="email">E-mail:<input type="text" name="email" id="email">
							</label>
						</div>
						<br>
						<div>
							<label for="phone">Telephone:<input type="text" name="phone" id="phone">
							</label>
						</div>
						<br>
						<div>
							<label for="subject">Subject:<input type="text" name="subject" id="subject">
							</label>
						</div>
						<br>
						<div>
							<label for="content">Message:<textarea name="content"></textarea>
							</label>
						</div>
						<br>
						<div>
							<button type="submit">Submit</button>
							<button type="reset">Reset</button>
						</div>
					</form>
				</fieldset>
				</div>
				<div class="column">
					<image src="map.png" id="map">
				</div>		
		</article>		
	</section>
	</fieldset>
	
</body>

</html>
<?php require_once('includes/footer.php'); ?>