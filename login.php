<?php
	include_once 'header.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<section class ="login-form">
		<center>
		<form action = "includes/login-inc.php" method="POST">

			<input type="text" name="username" placeholder= "Username/Email..">
			<input type="text" name="pwd" placeholder= "Password..">

			<button type="submit" name="submit">Login</button>
		</form>
		</center>
	</section>


		<?php
			if(isset($_GET["error"])){
		 		if ($_GET["error"] == "emptyInputLogin") {
		 			echo"<p>Fill in all fields</p>";
		 		}
		 		else if ($_GET["error"] == "wronglogin"){
		 			echo"<p>incorrect login information</p>";

		 		}

		  }


		 ?>
</body>
</html>
