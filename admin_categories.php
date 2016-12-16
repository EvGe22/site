<?php
	session_start();
	if (!isset($_SESSION['login']) || $_SESSION["role"]!=1) header('Location: index.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin - Categories</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
	<script src="/assets/js/jquery-3.1.1.js"></script>	
	<style type="text/css">
		.table-wrap img{
    		width: 150px;
    		height: 150px;    
		}   		
	</style>
</head>
<body>
	<?php include("assets/htmls/header.php"); ?>

	<main>
		<div class="table-wrap">
		<table>
			<tr>
				<th>Id</th>
				<th>title</th>
				<th>image</th>
				<th>description</th>
			</tr>
			<?php include("control/admin_categories_table.php"); ?>
		</table>
		<button>Add</button>
		</div>

	</main>
	
	<?php include("assets/htmls/footer.html"); ?>
	<link rel="stylesheet" type="text/css" href="assets/css/admin_table.css">
</body>
</html>
