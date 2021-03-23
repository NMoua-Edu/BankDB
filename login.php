<?php
	include_once 'header.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="includes/loginreg.css">
</head>
<body>
		<section class ="login-form">
		<div class="sidenav">
         <div class="login-main-text">
            <h2>Banking System<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
							<form action = "includes/login-inc.php" method="POST">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" name="username" placeholder="Username/Email..">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name ="pwd" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black" name="submit">Login</button>
									</form>
									<form action="signup.php" method="POST">
                  <button type="submit" class="btn btn-secondary" name ="submit">Register</button>
               </form>
							 <?php
									if(isset($_GET["error"])){
		 								if ($_GET["error"] == "emptyInputLogin") {
		 										echo"<p style='color: #B22222;'>Fill in all fields</p>";
		 								}
		 									else if ($_GET["error"] == "wronglogin"){
		 										echo"<p style='color: #B22222;'>incorrect login information</p>";

		 									}

		  							}
								 ?>
            </div>
         </div>
      </div>
	</section>



</body>
</html>
