<?php
include_once 'header.php';

?>
<link rel="stylesheet" href="includes/loginreg.css">
<section class="login-form">
	<div class="sidenav">
		<div class="login-main-text">
			<h2>Banking System<br> Register Page</h2>
			<p>Register here to gain access.</p>
		</div>
	</div>
	<div class="main">
		<div class="col-md-6 col-sm-12">
			<div class="register-form">
				<form action="includes/signup-inc.php" method="POST">
					<div class="form-group">
						<select type="text" name="acctype">
							<option value="customer">Customer</option>
							<option value="employee"> Employee</option>
						</select>
					</div>
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control" name="username" placeholder="Username..">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="pwd" placeholder="Password..">
					</div>
					<div class="form-group">
						<label>Confrim Password:</label>
						<input type="password" class="form-control" name="pwdcheck" placeholder="Confirm Password..">
					</div>
					<div class="form-group">
						<label>First Name:</label>
						<input type="text" class="form-control" name="fname" placeholder="First Name..">
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input type="text" class="form-control" name="lname" placeholder="Last Name..">
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" class="form-control" name="email" placeholder="Email..">
					</div>
					<button type="submit" class="btn btn-secondary" name="submit">Register</button>
				</form>
				<form action="login.php" method="POST">
					<?php
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyinput") {
							echo "<p style='color: #B22222;'>Fill in all fields</p>";
						} else if ($_GET["error"] == "invalidusername") {
							echo "<p style='color: #B22222;'>Choose a proper username</p>";
						} else if ($_GET["error"] == "invalidemail") {
							echo "<p style='color: #B22222;'>Choose a proper email</p>";
						} else if ($_GET["error"] == "passwordsdontmatch") {
							echo "<p style='color: #B22222;'>Passwords does not match</p>";
						} else if ($_GET["error"] == "usernametaken") {
							echo "<p style='color: #B22222;'>Username or Email Taken</p>";
						} else if ($_GET["error"] == "none") {
							echo "<p style='color: #B22222;'>You have signed up!/p>";
						}
					}
					?>
					<label>Already have an account?</label>
					<br>
					<button type="submit" class="btn btn-black" name="submit">Login</button>
				</form>

			</div>
		</div>
	</div>
</section>