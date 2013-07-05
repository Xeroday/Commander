<?php
if(isset($_GET['logout'])) {
	setcookie ("auth", "", time() - 1);
}
require_once("auth.php");
if (isLoggedIn()) header("Location: index.php");
if (isset($_POST['username'])) {
	$hash = sha1(crypt(md5($_POST['username'] . $_SERVER['REMOTE_ADDR']), sha1($_POST['password'])));
	if ($_POST['remember'] == 'checked') {
		$time = time()+3600*24*365; #Remember me for one year
	}
	setcookie('auth', $hash, $time, null, null, null, true);
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Commander - Login</title>
	<link href="assets/login.css" rel="stylesheet">
	<?php require_once("header.php"); ?>
</head>

<body>
	<div class="container">
		<div id="login-wraper">
		<form class="form login-form" method="post">
		<legend><span class="blue">Login</span></legend>
		
		<div class="body">
			<label>Username</label>
			<input type="text" name="username">

			<label>Password</label>
			<input type="password" name="password">
		</div>

		<div class="footer">
			<label class="checkbox inline">
				<input type="checkbox" id="inlineCheckbox1" value="checked" name="remember"> Remember me
			</label>
			            
			<button type="submit" class="btn btn-success">Login</button>
		</div>

		</form>
		</div>
	</div>
	<font color="white">
	<?php require_once("footer.php"); ?>
	<script src="assets/jquery.backstretch.min.js"></script>
	<script>
	jQuery(document).ready(function($) {
	$.backstretch([
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101), 
	      "assets/backgrounds.php?n=" + Math.floor(Math.random()*101)
	 ], {duration: 4000, fade: 1000});
			
	});
	</script>
</body>
</html>