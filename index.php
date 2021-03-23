<?php
include_once 'header.php';
require_once 'includes/function-inc.php';

?>

<!DOCTYPE html>
<html>
<head>
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