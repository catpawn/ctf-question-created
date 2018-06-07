<?php
include("security.php");
include("config.php");
?>

<html>
	<head>
		<script src="./js/jquery-3.2.1.slim.min.js"></script>
		<script src="./js/popper.min.js"></script>
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<script src="./js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Secure System</a>
		</nav>
		<br/>
		<div class="container">

			<?php
				session_start();

				if(isset($_POST['username']) && isset($_POST['password'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$secret = $security->AesEcbEncrypt($username.$password.$flag);
					$_SESSION['secret'] = $secret;
					header("Refresh:0");
				}

				if(isset($_SESSION['secret'])){
					echo "<h4> Hey! Here is your secret token:</h4><br/>".$_SESSION['secret']."<br/>";
				} else {
			?>
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Register</h4>
					<form method="POST" action="./">
						<div class="form-group">
							<label for="inputUsername">Username</label>
							<input class="form-control" id="inputUsername" aria-describedby="accountHelp" name="username" placeholder="Enter username">
							<small id="accountHelp" class="form-text text-muted">We'll never share your account with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="inputPassword">Password</label>
							<input type="password" class="form-control" id="inputPassword" name="password" aria-describedby="passwordHelp" placeholder="Enter password">
							<small id="passwordHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
						</div>
						<input type="submit" class="btn btn-primary" value="Register"/>
					</form>
				</div>
			</div>
			<?php }?>
		</div>
	</body>
</html>
