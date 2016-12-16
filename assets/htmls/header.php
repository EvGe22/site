<header>
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
	<div class="logo-div"><img class="logo" src="assets/img/logo.svg"></div>
	<div><a class="active" href="index.php">Home</a></div>
	<div class="dropdown">
		<a href="news.php" class="dropbtn">News</a>
		<div class="dropdown-content">
			<?php include("control/header.php"); ?>
		</div>
	</div>
	<div><a href="contact_us.php">Contact us</a></div>
	<?php include 'control/header_login.php'; ?>
	
</header>