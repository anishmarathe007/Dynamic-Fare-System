<?php 
session_start(); 
$_SESSION['login'] = 0;
?>

<html>
      <head>
        <link rel="stylesheet" type="text/css" href="Login.css">
    </head>
    <body>
<h2>Welcome To Indian Railways</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="Login1.php" method="post">
			<h1>Create Account</h1>
			<div class="social-container">
            </div>
			<span> Use your email for registration</span>
			<input type="text" placeholder="Name" name="name" />
			<input type="text" placeholder="Phone Number" name="phone" maxlength="10" />
			<input type="email" placeholder="Email" name="uname" />
			<input type="password" placeholder="Password" name="password" />
			<input type="password" placeholder="Retype Password" name="rpassword" />
			<button name="button">Register</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Heya!</h1>
				<p>To get Started, First Registed yourself with us.</p>
				<button class="ghost" id="signIn"></button>
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
		echo '<script>alert("Connected already..!!")</script>';	
	}

	$username = $_POST['uname'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];

	$flag=0;

	if (! ($password == $rpassword)) {
		echo '<script>alert("Passwords doesnt match..!!")</script>';
		$flag = 1;
	}

	$db_username = "SELECT username, password FROM login where username = '$username'";
	$dup_user = "SELECT username, password FROM login where username = '$username' and password = '$password' ";

	$res1 = mysqli_query($conn,$db_username);
	$count = mysqli_num_rows($res1);

	if ($count>0) 
	{
		$res = mysqli_query($conn,$dup_user);
		$count1 = mysqli_num_rows($res);

		if ($count1==1) 
		{
			echo '<script>alert("You already have an account Kindly Log In with these credentials")</script>';
			echo "<script> location.href='Login.php'; </script>";
        	exit;
		}
		else
		{
			echo '<script>alert("Username has Already taken kindly choose some other name")</script>';	
			echo "<script> location.href='Login1.php'; </script>";
        	exit;
		}
	}
	else 
	{
		if ($flag==1) {
			echo '<script>alert("Cannot log in enter the details correctly")</script>';		
		}
		else
		{
			$query = "INSERT INTO login(Name,phone,username,password) VALUES('$name',$phone,'$username','$password')";
			$result = mysqli_query($conn,$query);
			echo '<script>alert("You have successfully Registered..!! Kindly log in with the same credentials to continue.")</script>';	
			echo "<script> location.href='Login.php'; </script>";
			exit;
		}
	}
}

?>