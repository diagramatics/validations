<?php
	session_start();
	if (!isset($_SESSION['data'])){
		// Prevent direct access to register.php
		header('Location: input.php');
	}
	else{
		$inputs = $_SESSION['data'];
		session_destroy();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Foundation Programming Task - Done!</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<h1>Thanks for Registering</h1>
	<p>Registered Information:</p>

	<div>
		<span class="information">First Name : </span>
		<span class="content"><?php echo $inputs['fn']; ?></span>
	</div>
	<div>
		<span class="information">Last Name : </span>
		<span class="content"><?php echo $inputs['ln']; ?></span>
	</div>
	<div>
		<span class="information">Address : </span>
		<span class="content"><?php echo $inputs['street']; ?></span>
	</div>
	<div>
		<span class="information">Suburb : </span>
		<span class="content"><?php echo $inputs['suburb']; ?></span>
	</div>
	<div>
		<span class="information">State : </span>
		<span class="content"><?php echo $inputs['state']; ?></span>
	</div>
	<div>
		<span class="information">Postal Code : </span>
		<span class="content"><?php echo $inputs['postal']; ?></span>
	</div>
	<div>
		<span class="information">Telephone Number : </span>
		<span class="content"><?php echo $inputs['phone']; ?></span>
	</div>
	<div>
		<span class="information">Email : </span>
		<span class="content"><?php echo $inputs['email']; ?></span>
	</div>
</body>
</html>