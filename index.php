<?php

require_once 'includes/function-inc.php';

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<center>
			<h3>Bank Database System</h3>

			<form action="login.php" method="POST">
				<table>
						<td>
							<input type="submit" name="submit" value="Login">
						</td>
					</tr>
				</table>
			</form>


			<form action="signup.php" method="POST">
				<table>
						<td>
							<input type="submit" name="submit" value = "Signup">
						</td>
					</tr>
				</table>
			</form>
			<?php
			if(isset($_GET["error"])){
		 		if ($_GET["error"] == "none"){
		 			echo"<p>You have signed up!</p>";
		 		}
		 	}
		 	?>
	</center>

</body>
</html>