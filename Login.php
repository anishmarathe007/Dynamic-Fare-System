<?php 
session_start(); 
$_SESSION['login']=0;
?>

<html>
      <head>
        <link rel="stylesheet" type="text/css" href="Login.css">
    </head>
    <body>
<h2>Welcome To Indian Railways</h2>
<div class="container" id="container">
	
	<div class="form-container sign-in-container">
		<form action="Login.php" method="post">
			<h1>Sign in</h1>
			<span> use your account</span>
			<input type="email" placeholder="Email" name="uname" />
			<input type="password" placeholder="Password" name="password" />
			<a href="#">Forgot your password?</a>
			<button name="button">Log In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome!</h1>
				<p>Sign in to step into the world of Railways</p>
				<button class="ghost" id="signIn"></button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello User!</h1>
				<p>Sign in to dive into the world of Railways</p>
				<button class="ghost" id="signUp"></button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		&copy Anish Marathe || Muskan Pohani || Pushkar Kulkarni<i class="fa fa-heart"></i>
	</p>
</footer>
    </body>
</html>


<?php

if (isset($_POST['button'])) {
	
	$user = 'root';
	$pass = '';
	$db = 'train';

	$conn = mysqli_connect('localhost',$user,$pass,$db) or die("Couldn't Connect");

	if($conn)
	{ 
		echo '<script>alert("Connected..!!")</script>';	
	}

	$username = $_POST['uname'];
	$password = $_POST['password'];

	$dup_user = "SELECT username, password FROM login where username = '$username' and password = '$password' ";

	$res = mysqli_query($conn,$dup_user);
	$count = mysqli_num_rows($res);


	if ($count==1) 
	{
		$_SESSION['login'] = 1;
		$_SESSION['username'] = $username;
		echo "<script> location.href='map.php'; </script>";
				

        exit;
	}
	else
	{
		echo '<script>alert("Dear user you have not yet registered. Kindly Register..!!")</script>';	
		echo "<script> location.href='Login1.php'; </script>";
        exit;
	}
}

?>