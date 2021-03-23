<?php
include_once 'header.php';

?>

	<section class ="signup-form">
		<h2>Create and Online Account</h2>
		<h3>Basic information</h3>
		<center>
		<form action = "includes/signup-inc.php" method="POST">
			<select type = "text" name = "acctype" >
				<option value= "customer">Customer</option>
				<option value = "employee"> Employee</option>
			</select>
			<input type="text" name="username" placeholder= "Username..">
			<input type="password" name="pwd" placeholder= "Password..">
			<input type="password" name="pwdcheck" placeholder= "Confirm Password..">
			<input type="text" name="fname" placeholder= "First Name..">
			<input type="text" name="lname" placeholder= "Last Name..">
			<input type="text" name="email" placeholder= "Email..">

			<button type="submit" name="submit">Sign Up</button>
		</form>
		</center>
				<?php
			if(isset($_GET["error"])){
		 		if ($_GET["error"] == "emptyinput") {
		 			echo"<p>Fill in all fields</p>";
		 		}
		 		else if ($_GET["error"] == "invalidusername"){
		 			echo"<p>Choose a proper username</p>";

		 		}
		 		else if ($_GET["error"] == "invalidemail"){
		 			echo"<p>Choose a proper email</p>";

		 		}
		 		else if ($_GET["error"] == "passwordsdontmatch"){
		 			echo"<p>Passwords does not match</p>";

		 		}
		 		else if ($_GET["error"] == "usernametaken"){
		 			echo"<p>Username Taken/p>";

		 		}
		 		else if ($_GET["error"] == "none"){
		 			echo"<p>You have signed up!/p>";

		 		}


		  }
		 ?>
	</section>
