<div class="login-div dropdown">
	
	<a href="logout.php" class="dropbtn">
	<?php echo $_SESSION["login"]; ?>
	</a>
	<div class="dropdown-content drop-login">
		<?php 
			if ($_SESSION["role"] == 1){
				echo "<a href=\"admin_categories.php\">Admin Categories</a>";
				echo "<a href=\"admin_users.php\">Admin Users</a>";
			}
		?>
		<a href="logout.php">Log out</a>
	</div>

</div>
