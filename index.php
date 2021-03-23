<?php
include_once 'header.php';
require_once 'includes/function-inc.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="includes/loginreg.css">
</head>
<body>

	<section class ="login-form">
		<div class="sidenav">
         <div class="login-main-text">
            <h2>Banking System</h2>
            <p>Simple and Easy</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
							<p>Already have an account?</p>
							<form action="login.php" method="POST">
                  <button type="submit" class="btn btn-black btn-lg btn-block" name="submit">Login Here</button>
									</form>
							<p>Don't have an account?</p>
							<form action="signup.php" method="POST">
                  <button type="submit" class="btn btn-secondary btn-lg btn-block" name ="submit">Register</button>
               </form>
            </div>
         </div>
      </div>
	</section>
			<?php
			if(isset($_GET["error"])){
		 		if ($_GET["error"] == "none"){
		 			echo"<p>You have signed up!</p>";
		 		}
		 	}
		 	?>


</body>
</html>
