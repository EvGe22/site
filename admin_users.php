<?php
	session_start();
	if (!isset($_SESSION['login']) || $_SESSION["role"]!=1) header('Location: index.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin - users</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
	<script src="/assets/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="assets/js/admin_table_users.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/admin_table.css">
</head>
<body>
	<?php include("assets/htmls/header.php"); ?>

	<main>
		<div class="table-wrap">
		<table>
			<tr>
				<th>Id</th>
				<th>login</th>
				<th>first_name</th>
				<th>last_name</th>
				<th>actions</th>
			</tr>			
			<?php include 'control/admin_users_table.php'; ?>
		</table>
		<button id="open-form">Add user</button>		
		</div>
		<div class="modal">		
		<div class="modal-content">
      		<div class="form-modal">
      		<span id="close-button">X</span>	
          		<form class="add-user-form" action="control/add_user.php" method="post">
          			<input id="id-input" type="text" name="id" hidden>
            	  	<input id="login-input" type="text" name="login" placeholder="username" required/>
            	  	<input id="pass-input" type="text" name="password" placeholder="password" required/>
            	  	<input id="fn-input" type="text" name="first_name" placeholder="first_name" required/>
            	  	<input id="ln-input" type="text" name="last_name" placeholder="last_name" required/>
            	  	<input id="type-input" type="text" name="type" hidden/>
            	  	<button id="form-button">Add user</button>            	  
          		</form>
      		</div>
  		</div> 
		</div>
	</main>
	
	<?php include("assets/htmls/footer.html"); ?>
</body>
</html>
